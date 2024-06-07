<?php

Namespace src\models\dashboarder;

use core\sql\QueryBuilder;
use core\sql\SqlRequest;
use src\controllers\AccessController;
use src\models\Request;
use src\models\User;
use src\models\utils\Mail;

class dashboarder{

    function CountUsers(){
        $sql= new SqlRequest();
        // $q = $sql->countData(new user());
        $q= new QueryBuilder();
        $result = $q->select("COUNT(*)")->table("user")->get();
           return $result;
        // dump($result);
    }

    static function getUser(){
        $q= new SqlRequest();
        $data=$q->selectAll(new User());
        return $data;
    }

    static function getPrestator(){
        $q= new SqlRequest();
        $data=$q->selectBy(new User(), "hotelMnger='1' OR carRentalAgent='1'");
        return $data;
    }

    static function validRequest($rCode){
        $q = new QueryBuilder();
        $q->table("request")->where("codeRequest='$rCode'")->update(["valid" => 1]);

        $sq = new SqlRequest();
        $rq = $sq->selectBy(new Request(), "codeRequest='$rCode'")[0];
        $sq->close();
        $codeUsr = $rq->getCodeUser();
        $srvc = $rq->getService();
        if (array_key_exists($srvc, _service) && $srvc == "1") {
            $cCRA = (new AccessController())->Code("CRA");
            $q->table("caragency")->insert([
                "codeCarAgency" => $cCRA,
                "carAgencyName"  => $rq->getCompanyName(),
                "country" => $rq->getCountry(),
                "codeUser" => $codeUsr
            ]);
            $q->table("user")->where("codeUser='$codeUsr'")->update([
                "carRentalAgent" => 1
            ]);
            $q->table("image")->where("codeOwner='$rCode'")->update([
                "codeOwner" => $cCRA
            ]);
            // SEND MAIL HERE
            $usr = $q->select("email,fullName")->table("user")->where("codeUser = '$codeUsr'")->get()[0];
            Mail::sendMail($usr["email"],$usr["fullName"],"Your Request to be a Rental car agent is accepted");
        
        } else if (array_key_exists($srvc, _service) && $srvc == "2") {
            $cHTL = (new AccessController())->Code("HTL");
            $q->table("hotel")->insert([
                "codeHotel" => $cHTL,
                "hotelName"    => $rq->getCompanyName(),
                "country" =>  $rq->getCountry(),
                "codeUser" => $codeUsr
            ]);
            $q->table("image")->where("codeOwner='$rCode'")->update([
                "codeOwner" => $cHTL
            ]);
            $q->table("user")->where("codeUser='$codeUsr'")->update([
                "hotelMnger" => 1
            ]);
            // SEND MAIL HERE
            $usr = $q->select("email,fullName")->table("user")->where("codeUser = '$codeUsr'")->get()[0];
            Mail::sendMail($usr["email"],$usr["fullName"],"Your Request to be a hotel manager is accepted");
        }
    }
    
}