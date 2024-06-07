<?php
namespace src\controllers;
final class Utils
{
    static function isLogin(){
        if(isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]==1)
            return true;
        else
            return false;
    }
    static function isAdmin(){
        if(isset($_SESSION["auth_usr"]) && $_SESSION["auth_usr"]["admin"]==1)
            return true;
        else
            return false;
    }

    static function isHotelMnger(){
        if(isset($_SESSION["auth_usr"]) && $_SESSION["auth_usr"]["hotelMnger"]==1)
            return true;
        else
            return false;
    }

    static function isCarRentalAgent(){
        if(isset($_SESSION["auth_usr"]) && $_SESSION["auth_usr"]["carRentalAgent"]==1)
            return true;
        else
            return false;
    }
}
