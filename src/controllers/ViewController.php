<?php

namespace src\controllers;
use core\sql\QueryBuilder;
use core\template\View;
use core\tools\Crypto;
use Error;
use Exception;
use src\models\Bookingroom;
use src\models\cars\Listcar;
use src\models\custom\Ticket;
use src\models\hotel\listhotel;


class ViewController
{

    function index()
    {
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $showhotel = new listhotel();
        $data = $showhotel->FunctionHotel();

        $showCar= new Listcar();
        $dataCar=$showCar->FunctionCar();

        $drills = [
            "authUser" => $clt,
            "js" => "flight/flight-js",
            "data" => [$data[0],$data[1],$data[2]],
            "dataCar"=>$dataCar
        ];

        View::render("home-front", $drills);
    }

    function aboutus()
    {
        session_start();
        $styleCss = "about-us";
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        View::render("about-us", ["authUser" => $clt, "style" => $styleCss]);
    }

    /**
     * @Methode("GET")
     */
    function flight($way = null, $originLocationCode = null, $destinationLocationCode = null, $date_of = null, $date_Back = null, $adult = null)
    {
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }

        $drills = [
            "authUser" => $clt,
            "style" => "flight",
            "js" => ["flight/flight-js","Controllers/modal"]
        ];

        $drills["dataSent"] = ["originLocationCode" => $originLocationCode, "destinationLocationCode" => $destinationLocationCode, "date_of" => $date_of, "date_Back" => $date_Back, "adult" => $adult];



        View::render("flight", $drills);
    }

    /**
     * @Methode("GET")
     */
    function hotel($country = null, $checkDates = null, $minPrice = null, $maxPrice = null)
    {
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $showhotel = new listhotel();
        $data = $showhotel->FunctionHotel();
        $drills = [
            "authUser" => $clt,
            "style" => "hotel",
            "js" => "flight/view-ctrl",
            "data" => $data
        ];

        if ($checkDates != null && $minPrice != null && $maxPrice != null) {
            $datesSet = explode(" - ", $checkDates);
            $checkIn = $datesSet[0];
            $checkOut = $datesSet[1];
            $_SESSION["checkIn"] = $checkIn;
            $_SESSION["checkOut"] = $checkOut;
            $data = $showhotel->searchHotel($country, $minPrice, $maxPrice);
            $drills["data"] = $data;
            $drills["checkIn"] = $checkIn;
            $drills["checkOut"] = $checkOut;
            $drills["country"] = $country;
            $drills["minPrice"] = $minPrice;
            $drills["maxPrice"] = $maxPrice;
        }
        View::render("hotel", $drills);
    }

    function room($codeHotel, $adults = null, $children = null)
    {
        session_start();
        $styleCss = "room";
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $drills = [];
        $rooms = listhotel::getRooms($codeHotel);

        if ($adults != null && $children != null) {
            $adults = (is_numeric($adults)) ? $adults : 0;
            $children =  (is_numeric($children)) ? $children : 0;
            $rooms = listhotel::searchRooms($codeHotel, $adults, $children);
            $drills["adults"] = $adults;
            $drills["children"] = $children;
        }

        $q = new QueryBuilder();
        $hotel = $q->select("*")->table("hotel")->where("codeHotel = '$codeHotel'")->get()[0];
        $drills["authUser"] = $clt;
        $drills["style"] = "room";
        $drills["js"] = ["flight/view-ctrl","hotel/roomCtrl"];
        $drills["rooms"] = $rooms;
        $drills["hotel"] = $hotel;
        View::render("room", $drills);
    }
    
    function car()
    {
        // $brand='Honda';
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $showCar= new Listcar();
        $data=$showCar->FunctionCar();
        $drills = [
            "authUser" => $clt,
            "style" => "car",
            "js" => "car/carCtrl",
            "data"=>$data
        ];

        // if ($brand != null && $minPrice != null && $maxPrice != null) {
            
        //     $data=$showCar->FunctionSearchCar($brand, $minPrice, $maxPrice);

        //     $drills["data"] = $data;

        // }
        // $originLocationCode = $_GET['originLocationCode'];
        View::render("car",$drills);
    }


    function DetailCar($codeCar)
    {
        session_start();
        $styleCss = "room";
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $detailCar= new Listcar();
        $data=$detailCar->getcar($codeCar);
        $imgCar=$detailCar->getImgcar($codeCar);
        $drills = [
            "authUser" => $clt,
            "style" => $styleCss,
            "js" => "car/validation",
            "data"=>$data,
            "imgCar"=>$imgCar
        ];
        $_SESSION["codeCode"]=$codeCar;
        View::render("DetailCar", $drills);
    }

    function myBookings(){
        session_start();
        $styleCss = "myBookings";
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $codeUser = $clt["codeUser"];
        $rentalCar= new Listcar();
        $data= $rentalCar->mybookingsCar($codeUser);
        $bookingRoom = new listhotel();
        $dataRoom = $bookingRoom->mybookingsHotel($codeUser);
        $drills= [
            "authUser"=> $clt,
            "style"=>$styleCss,
            "data"=>$data,
            "dataRoom"=>$dataRoom
            // "authUser" => $_SESSION["auth_usr"]
        ];
        // var_dump($dataRoom);
        View::render("/mybookings", $drills);
    }

    function chat(){
        session_start();
        $styleCss = "chatCustomer";
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        View::render("chatCustomer", ["authUser" => $clt, "style" => $styleCss]);
    }
}


