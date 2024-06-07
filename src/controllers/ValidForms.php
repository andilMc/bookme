<?php

namespace src\controllers;

use DateTime;
use DateInterval;
use core\tools\Crypto;
use core\template\View;
use core\sql\SqlRequest;

use src\models\Rentalcar;
use core\sql\QueryBuilder;
use src\models\utils\Mail;
use src\models\Bookingroom;
use src\models\hotel\Listhotel;
use src\models\utils\Transaction;

class ValidForms
{
    /**
     * @Methode("GET")
     */
    function selectRoom($codeRoom)
    {
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $q = new QueryBuilder();
        $images = $q->select("pathImg")->table("image")->where("codeOwner = '$codeRoom'")->get();
        $room = $q->select("*")->table("room")->where("codeRoom = '$codeRoom'")->get()[0];
        // dump($clt);
        $drills = [
            "authUser" => $clt,
            "style" => "room",
            "js" => "flight/view-ctrl",
            "images" => $images,
            "room" => $room,
        ];

        View::render("bookRoom", $drills);
    }

    /**
     * @Methode("POST")
     */
    function ConfirmBookingCar()
    {
        session_start();
        if (Utils::isLogin()) {
            $clt = $_SESSION["auth_usr"];
            $numCard = str_replace(" ", "", $_POST["cardNumber"]);
            $clientAddress = $_POST["clientAddress"];
            $clientCity = $_POST["clientCity"];
            $clientState = $_POST["clientState"];
            $clientZip = $_POST["clientZip"];
            $cardHolderName = $_POST["cardHolderName"];
            $exp = str_replace(" ", "", $_POST["exp"]);
            $cvc = $_POST["cvc"];
            $idRent = $_POST["cfCar"];
    
            $sql = new SqlRequest();
            $rentalData = $sql->selectBy(new Rentalcar(),"idRental = '$idRent'")[0];
            $r=Transaction::transaction($clt["codeUser"],$clt["email"],$numCard,$clientAddress,$clientCity,$clientState,$clientZip,$cardHolderName,$exp, $cvc);
            if ($r) {
                $q = new QueryBuilder();
                $q->table("rentalcar")->where("idRental=$idRent")->update(["confirmed" => 1]);
                $drills = [
                    "authUser" => $clt,
                    "style" => "car",
                    "cf_car" => true
                ];
                Mail::sendMail($clt["email"], $clt["fullName"],"Your Car renting is done");
                View::render("bookingConfirm", $drills);
            }else {
                dump("Transaction Failed");
            }
        } else {
            header("Location: " . base_url . "/login");
        }
    }

    function ConfirmBookingHotel()
    {
        session_start();
        if (Utils::isLogin()) {
            $clt = $_SESSION["auth_usr"];
            // dump($_POST);
            // exit;
            $numCard = str_replace(" ", "", $_POST["cardNumber"]);
            $clientAddress = $_POST["clientAddress"];
            $clientCity = $_POST["clientCity"];
            $clientState = $_POST["clientState"];
            $clientZip = $_POST["clientZip"];
            $cardHolderName = $_POST["cardHolderName"];
            $exp = str_replace(" ", "", $_POST["exp"]);
            $cvc = $_POST["cvc"];
            $idBook = $_POST["idrent"];

            $sql = new SqlRequest();
            $rentalData = $sql->selectBy(new Bookingroom(), "id = '$idBook'");
            $r = Transaction::transaction($clt["codeUser"], $clt["email"], $numCard, $clientAddress, $clientCity, $clientState, $clientZip, $cardHolderName, $exp, $cvc);
            if ($r) {
                $q = new QueryBuilder();
                $q->table("bookingroom")->where("id='$idBook'")->update(["confirmed" => 1]);
                $drills = [
                    "authUser" => $clt,
                    "style" => "car",
                    "cf_car" => true
                ];
                Mail::sendMail($clt["email"], $clt["fullName"], "your hotel reservation and payment have been processed! thank you for your confidence😊");
                View::render("bookingHotelConfirm", $drills);
            } else {
                dump(" Hotel Transaction Failed");
            }
        } else {
            header("Location: " . base_url . "/login");
        }
    }

   

    /**
     * @Methode("POST")
     */
    function RentCarInformation()
    {
        session_start();

        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        
        if (isset($_SESSION["codeCode"]) && !empty($_SESSION["codeCode"])) {
            $name = $_POST["name"];
            $address = $_POST["adress"];
            $withDriver = (isset($_POST["withDriver"])) ? $_POST["withDriver"] : "off";
            $deliveryTime = $_POST["deliveryTime"];
            $rentingTime = $_POST["rentingTime"];

            if (Utils::isLogin()) {
                $q = new QueryBuilder();
                $res = $q->select("car.*,pathImg")
                    ->table("car")
                    ->join("image", "codeOwner = codeCar")
                    ->where("codeCar='" . $_SESSION["codeCode"] . "'")
                    ->get();
                $car = [
                    "id_car" =>  $res[0]["id_car"],
                    "make" =>  $res[0]["make"],
                    "model" =>  $res[0]["model"],
                    "license_plate" =>  $res[0]["license_plate"],
                    "price_per_day" =>  $res[0]["price_per_day"],
                    "driverPrice" =>  $res[0]["driverPrice"],
                    "typeCar" =>  $res[0]["typeCar"],
                    "codeCar" => $res[0]["codeCar"]
                ];
                
                $car_img = [];
                for ($i = 0; $i < count($res); $i++) {
                    $car_img[] = $res[$i]["pathImg"];
                }
                $car["imgs"] = $car_img;
                $dt = new DateTime($deliveryTime);

                $dt->add(DateInterval::createFromDateString("$rentingTime day"));
                $rentingData = [
                    "name" => $name,
                    "address" => $address,
                    "driver" => $withDriver,
                    "deliveryTime" => $deliveryTime,
                    "duration" => $rentingTime,
                    "returnDate" => $dt->format("d-m-Y"),
                ];
                $rentingData["totale_price"] = ($car["price_per_day"] + $car["driverPrice"]) * $rentingData["duration"];
                    $recntCar = new Rentalcar(
                        null,
                        $_SESSION["codeCode"],
                        $_SESSION["auth_usr"]["codeUser"],
                        null,
                        $deliveryTime,
                        $dt->format("d-m-Y"),
                        null,
                        '0',
                        $withDriver,
                        $rentingData["totale_price"],
                        $rentingData["name"],
                        $rentingData["address"],
                        // $_SESSION["auth_usr"]["codeUser"],

                    );
                    $sql = new SqlRequest();
                    $rep = $sql->insert($recntCar);
                    if ($rep) {
                        $_SESSION["insertRentCar"] = 1;
                        $_SESSION["idRecntCar"] = $rep;
                        $sql->close();
                    }
                    

                $idCar    = $_SESSION["codeCode"];
                $codeClient    = $_SESSION["auth_usr"]["codeUser"];
                $pickupDate    = $deliveryTime;
                $returnDate    = $dt->format("d-m-Y");
                $customerName = $rentingData["name"];
                $Address = $rentingData["address"];
                $qb = new QueryBuilder();
                if (!empty($_SESSION["idRecntCar"])) {
                    $rentingData["idRent"] = $_SESSION["idRecntCar"];
                    $drills = [
                        "authUser" => $clt,
                        "style" => "car",
                        "js" => [
                            "Controllers/modal",
                            "Controllers/jquery.payment",
                            "Controllers/payment"
                        ],
                        "car" => $car,
                        "rentData" => $rentingData
                    ];
                    View::render("rentInfoCar", $drills);
                }
            } else {
                header("Location: " . base_url . "/login");
            }
        } else {
            dump("Some thing went wrrong");
        }
    }
    
    /**
     * @Methode("POST")
     */
    function RentHotelInformation($codeRoom)
    {
        session_start();
        $clt = [];
        if (Utils::isLogin()) {
            $clt = $_SESSION["auth_usr"];

            $name = $_POST['customerName'];
            $dateCheck = $_POST['checkDates'];

            $parts = explode(" - ", $dateCheck);
            $CheckIn = $parts[0];
            $CheckOut = $parts[1];

            $dateIn = DateTime::createFromFormat('m/d/Y', $CheckIn);
            $formattedDateIn = $dateIn->format('Y-m-d');
            $dateOut = DateTime::createFromFormat('m/d/Y', $CheckOut);
            $formattedDateOut = $dateOut->format('Y-m-d');

            $datetime1 = new DateTime($CheckIn);
            $datetime2 = new DateTime($CheckOut);

            $interval = $datetime1->diff($datetime2);
            $nbrDays = $interval->days;
            $comment = "no comment";
            $confirmed = "0";
            $codeUser = $clt["codeUser"];
            $q = new Listhotel();
                $data = $q->ConfirmBookingHotel($codeRoom, $codeUser);
                $saveRent = $q->SaveHotelRent($formattedDateIn, $formattedDateOut, $comment, $codeUser, $codeRoom, $name, $confirmed);
                if(isset($_POST['btnpayement'])){
                    echo "je suis fatigué de ce code";
                }
                $drills = [
                    "authUser" => $clt,
                    "style" => "car",
                    "js" => [ "Controllers/modal",
                    "Controllers/jquery.payment",
                    "Controllers/payment"],
                    "data" => $data,
                    "CheckIn" => $CheckIn,
                    "CheckOut" => $CheckOut,
                    "name" => $name,
                    "nbrDays" => $nbrDays,
                    "idRent" => $saveRent,

                ];
                View::render("rentinfoHotel", $drills);
        } else {
            header("Location: " . base_url . "/login");
        }
    }

}
