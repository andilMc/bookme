<?php

namespace src\controllers;

use core\file\File;
use core\sql\QueryBuilder;
use core\sql\SqlRequest;
use core\template\View;

final class Profile
{
    /**
     * @Methode("GET","POST")
     */
    function index()
    {
        session_start();
        if (Utils::isLogin() && isset($_SESSION["auth_usr"])) {

            $usr_code = $_SESSION["auth_usr"]["codeUser"];
            $this->updateImgProfile($usr_code);
            $this->updatePersonalInformation($usr_code);
            
            $drills = [
                "style" => "",
                "js" => [
                    "Controllers/inputControllers"
                ],
                "authUser" => $_SESSION["auth_usr"]
            ];
            View::render("UserProfile", $drills);
        } else {
            header("Location:" . base_url . "/login");
        }
    }

    function updateImgProfile($usr_folder)
    {
        if (isset($_FILES["imgProfile"]) && !empty($_FILES["imgProfile"])) {
            $_FILES["imgProfile"]["name"] = $usr_folder . "_profile." . pathinfo($_FILES["imgProfile"]["name"], PATHINFO_EXTENSION);
            $path = File::upload($_FILES["imgProfile"], __DIR__ . "/../../public/upload/$usr_folder/", ["jpeg", "jpg", "png"]);
            if ($path) {
                $q = new QueryBuilder();
                $url_img = "/upload/$usr_folder/" . $_FILES["imgProfile"]["name"];
                $q->table("user")->where("codeUser='$usr_folder'")->update(["imgProfile" => $url_img]);
                    $_SESSION["auth_usr"]["imgProfile"] = $url_img;
            } else {
                dump("error");
            }
        }
    }

    function updatePersonalInformation($usr_code)
    {
        if (
            isset($_POST["fullName"]
            ,$_POST["dateBirth"]
            ,$_POST["phoneNumber"]
            ,$_POST["country"]
            ,$_POST["email"]
            ,$_POST["address"]) 
            && !empty($_POST["phoneNumber"]) 
            && !empty($_POST["fullName"]) 
            && !empty($_POST["email"])) {
               $q = new QueryBuilder();
               $q->table("user")
               ->where("codeUser='$usr_code'")
               ->update([
                "fullName"=>$_POST["fullName"],
                "phoneNumber"=>$_POST["phoneNumber"],
                "email"=>$_POST["email"],
                "birthDate"=>$_POST["dateBirth"],
                "birthCountry"=>$_POST["country"],
                "address"=>$_POST["address"],
               ]);

                $_SESSION["auth_usr"]["fullName"] = $_POST["fullName"];
                $_SESSION["auth_usr"]["phoneNumber"] = $_POST["phoneNumber"];
                $_SESSION["auth_usr"]["email"] = $_POST["email"];
                $_SESSION["auth_usr"]["birthDate"] = $_POST["dateBirth"];
                $_SESSION["auth_usr"]["address"] = $_POST["address"];
                $_SESSION["auth_usr"]["birthCountry"] = $_POST["country"];

        }
    }

    function Bookings() {
        
    }
}
