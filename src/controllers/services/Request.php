<?php

namespace src\controllers\services;

use core\file\File;
use core\sql\QueryBuilder;
use core\template\View;
use src\controllers\AccessController;
use src\controllers\Utils;

class Request
{
    /**
     * @Methode("GET")
     */
    function index()
    {
        session_start();
        if (Utils::isLogin()) {
            $drills = [
                "style" => "request/main-request"
            ];
            View::render("request/service-provider", $drills);
        } else {
            header("Location:" . base_url . "/404");
        }
    }
    /**
     * @Methode("POST")
     */
    function requestService($service, $companyName, $country, $bNumber, $license, $insurance, $imgs)
    {
        session_start();
        if (Utils::isLogin()) {
            if (!empty($service) && !empty($companyName) && !empty($country) && !empty($bNumber) && !empty($imgs) && !empty($license) && !empty($insurance)) {
                $q = new QueryBuilder();
                $acc = new AccessController();
                $code = $acc->Code("RQST");

                $usr_folder = $_SESSION["auth_usr"]["codeUser"];
                // upload license
                $license["name"] =  $usr_folder . "_" . $service . "_license." . pathinfo($license["name"], PATHINFO_EXTENSION);
                $path_license = File::upload($license, __DIR__ . "/../../../public/upload/serviceRequest/$usr_folder/", ["pdf", "PDF"]);
                $url_license = "/upload/serviceRequest/$usr_folder/" . $license["name"];
                // upload assurence
                $insurance["name"] =  $usr_folder . "_" . $service . "_insurance." . pathinfo($insurance["name"], PATHINFO_EXTENSION);
                $path_insurance = File::upload($insurance, __DIR__ . "/../../../public/upload/serviceRequest/$usr_folder/", ["pdf", "PDF"]);
                $url_insurance = "/upload/serviceRequest/$usr_folder/" . $insurance["name"];

                // upload images
                $images = [];
                $nbrFile = count($imgs["name"]);

                for ($i = 0; $i < $nbrFile; $i++) {

                    $images[$i]["name"] = $usr_folder . "_$i" . "_$service" . "_img_establishment." . pathinfo($imgs["name"][$i], PATHINFO_EXTENSION);
                    $images[$i]["full_path"] = $imgs["full_path"][$i];
                    $images[$i]["error"] = $imgs["error"][$i];
                    $images[$i]["size"] = $imgs["size"][$i];
                    $images[$i]["tmp_name"] = $imgs["tmp_name"][$i];
                }

                foreach ($images as $img) {
                    $path_img_establishment = File::upload($img, __DIR__ . "/../../../public/upload/serviceRequest/$usr_folder/img/", ["png", "jpeg", "jpg"]);
                    if ($path_img_establishment) {
                        $url_img_establishment = "/upload/serviceRequest/$usr_folder/img/" . $img["name"];
                        $q->table("image")->insert([
                            "pathImg" => $url_img_establishment,
                            "codeOwner" => $code
                        ]);
                    }
                }
                if ($path_license && $path_insurance) {

                    $test = $q->table("request")->insert([
                        "service" => $service,
                        "companyName" => $companyName,
                        "country" => $country,
                        "bNumber" => $bNumber,
                        "license" => $url_license,
                        "insurance" => $url_insurance,
                        "codeRequest" => $code,
                        "codeUser"=>$usr_folder
                    ]);
                    if ($test) {
                        header("Location: " . base_url . "/success");
                    }
                }
            } else {
                dump("No");
            }
        } else {
            header("Location:" . base_url . "/404");
        }
    }

    /**
     * @Methode("GET")
     */
    function successSubmit()
    {
        session_start();
        if (Utils::isLogin()) {
            $drills = [
                "style" => "request/main-request"
            ];
            View::render("request/success-view");
        } else {
            header("Location:" . base_url . "/404");
        }
    }
}
