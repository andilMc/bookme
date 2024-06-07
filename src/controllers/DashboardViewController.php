<?php

namespace src\controllers;

use core\file\File;
use core\sql\QueryBuilder;
use core\sql\SqlRequest;
use core\template\View;
use src\models\hotel\listhotel;
use src\controllers\AccessController;
use src\models\cars\Listcar;
use src\models\dashboarder\dashboarder;
use src\models\Hotel;
use src\models\Request;
use src\models\User;


class DashboardViewController
{
    /**
     * @Methode("GET")
     */
    function index()
    {
        session_start();
        if ($_SESSION["auth_usr"]["admin"] == 1 || $_SESSION["auth_usr"]["hotelMnger"] == 1 || $_SESSION["auth_usr"]["carRentalAgent"] == 1) {
            $nbrUsr = new dashboarder();
            $usrnbr = $nbrUsr->CountUsers();
            $data2 = $nbrUsr->getUser();
            $data3 = $nbrUsr->getPrestator();
            $data = $usrnbr[0]["COUNT(*)"];
            $drills = [
                "style" => ["admin/add-service", "admin/admin-main"],
                "js" => "car/carCtrl",
                "data" => $data,
                "data2" => $data2,
                "data3" => $data3,
                "authUser" => $_SESSION["auth_usr"]
            ];
            View::render("admin/admin-home", $drills);
        } else {
            header("Location: " . base_url . "/profile");
        }
    }

    function newoffer()
    {
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $codeUser = $_SESSION["auth_usr"]["codeUser"];
        $q = new SqlRequest();
        $hotel = $q->selectBy(new Hotel(), "codeUser='$codeUser'");
        $codehtl = $hotel[0]->getCodeHotel();
        if (isset($_POST['btnPublish'])) {
            $idAvailable = 0;
            $price = $_POST['price'];
            $type = $_POST['type'];
            $Roomnbr = $_POST['nbrRoom'];
            // $codehtl = "$codeHotel";
            // $codehtl = $hotel[0]->getCodeHotel();
            $description = $_POST['Description'];
            $ac = new AccessController();
            $coderoom = $ac->Code("RM");
            // $coderoom="Rm1246d";
            $wifi = $_POST['wifi'];
            $bedSize = "";
            $maxPerson = $_POST['person'];
            $children = $_POST['childrenNbr'];
            $breackfast = $_POST['breackfast'];

            $img = $_FILES['img']["name"];

            // dump($_POST, empty($type));
            // exit;

            if ($price === "" || $type === "" || $Roomnbr === "" || $wifi === "" || $maxPerson === "" || $children === "" || $breackfast === "") {

                echo "<script>alert('Operation failed😣!');</script>";

                header("Location: newoffer");
                exit();
                // echo '<div><dialog open><p>Operation failed😣!</p>
                // <form method="dialog">
                //   <button>OK</button>
                // </form>
                // </dialog></div>';          

            } else {
                $folder_name = "Hotel_" . $codehtl;
                // Chemin d'accès complet
                $path = __DIR__ . "/../../public/upload/$folder_name/";

                $path = File::upload($_FILES["img"], $path, ["jpeg", "jpg", "png"]);

                // insert dans le bd
                $path1 = "/upload/$folder_name/" . $img;

                $addrm = new listhotel();
                $data = $addrm->AddRoom("$idAvailable", $price, $type, $Roomnbr, $codehtl, $description, "$coderoom", "$wifi", $bedSize, $maxPerson, "$children", "$breackfast", $path1);
                echo "<script>alert('Operation sucess🎉!');</script>";
                header("Location: /dashboard/hotel");
                // echo '<div><dialog open><p>Operation sucess🎉!</p>
                // <form method="dialog">
                //   <button>OK</button>
                // </form>
                // </dialog></div>  admin/hotel';    
            }
        }

        $drills = [
            "style" => ["admin/add-service", "admin/admin-main"],
            "js" => "car/carCtrl",
            // "data"=>$data
        ];

        // dump($codehtl);
        View::render("admin/add-service", $drills);
    }

    function addVehicle()
    {
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        if (Utils::isLogin() && Utils::isCarRentalAgent()) {
            if (isset($_POST['btnPublish'])) {
                if (isset($_SESSION["auth_usr"]["codeCarAgency"])) {
                    $type = $_POST['type'];
                    $brand = $_POST['brand'];
                    $model = $_POST['model'];
                    $price = $_POST['price'];
                    $driverPrice = $_POST['driverPrice'];
                    $yearIssue = $_POST["yearIssue"];
                    $fuelType = $_POST["fuelType"];
                    $transmission = $_POST["transmission"];
                    $description = $_POST['description'];
                    $color = $_POST['color'];

                    $ac = new AccessController();
                    $codeCar = $ac->Code("CR");
                    $licence_plate = $_POST['licence_plate'];
                    $codeCarAgency = $_SESSION["auth_usr"]["codeCarAgency"];
                    //$yearIssue,$fuelType ,$transmission,$color
                    // $path=$_POST['img'];
                    $codeUser = $clt;
                    var_dump($codeUser);

                    if (empty($brand) || empty($model) || empty($price) || empty($type) || empty($licence_plate)) {
                        echo "<script>alert('Operation failed😣!');</script>";
                    } else {
                        $AddCr = new Listcar();
                        $data = $AddCr->AddCar($brand, $model, $licence_plate, $price, $driverPrice, $type, $codeCar, $_FILES["img"], $description, $codeCarAgency, $yearIssue, $fuelType, $transmission, $color);
                        header("Location:" . base_url . "/dashboard/car");
                    }
                } else {
                    header("Location:" . base_url . "/dashboard/car");
                }
            }
            $drills = [
                // "authUser" => $_SESSION["auth_usr"],
                "authUser" => $clt,
                "style" => ["admin/admin-main", ""],
                "js" => "car/carCtrl",
                // "data"=>$data
            ];
            View::render("admin/add-hevicle", $drills);
        }
    }


    function customer()
    {
        $css = ["admin/admin-main", "admin/customer"];
        View::render("admin/customer", ["style" => $css]);
    }

    function booking()
    {
        session_start();
        $clt = [];

        // $q= new Listcar();
        // $data= $q->getRentalCar();
        // dump($data);

        $drills = [
            "style" => ["admin/admin-main", "admin/booking"],
            "js" => "car/carCtrl",
            // "data"=>$data
        ];
        // $css = ["admin/admin-main", "admin/booking"];
        View::render("admin/booking", $drills);
    }
    function detailbook()
    {
        $css = ["admin/admin-main", "admin/detailbook"];
        View::render("admin/detailbook", ["style" => $css]);
    }


    function srvce()
    {
        session_start();
        if (Utils::isLogin() && Utils::isAdmin()) {
            $sql = new SqlRequest();
            $requests = $sql->selectAll(new Request());

            $data = [];

            if (isset($_POST["valid"]) && isset($_POST["code"])) {
                $rCode = $_POST["code"];
                dashboarder::validRequest($rCode);
                header("Location: " . base_url . "/dashboard/srvce-q#");
            }

            foreach ($requests as $request) {
                $user = $sql->selectBy(new User(), "codeUser = '" . $request->getCodeUser() . "'");
                $data[] = [
                    "user" => $user[0],
                    "request" => $request
                ];
            }

            $drills = [
                "request_liste" => array_reverse($data),
                "authUser" => $_SESSION["auth_usr"],
                "style" => ["admin/admin-main", "admin/detailbook"],
                "js" => "Controllers/modal"
            ];
            View::render("admin/srvce-v", $drills);
            $sql->close();
        }
    }

    function CarView()
    {
        session_start();
        if (Utils::isLogin() && $_SESSION["auth_usr"]["carRentalAgent"] == 1) {
            $codeUser = $_SESSION["auth_usr"]["codeUser"];
            if (isset($_POST["updateMainImg"])) {
                Listcar::UpdateMainImgCar($codeUser);
            }

            $cars = Listcar::getCars($codeUser);
            $drills = [
                "authUser" => $_SESSION["auth_usr"],
                "style" => ["admin/admin-main", "admin/detailbook"],
                "js" => ["Controllers/modal", "Controllers/inputControllers"],
                "cars" => $cars
            ];
            View::render("admin/carview/car-view", $drills);
        } else {
            header("Location: " . base_url);
        }
    }

    function BookingsCar(){
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $q = new Listcar();
        $codeUser=$_SESSION["auth_usr"]["codeUser"];
        $Cars = $q->bookingsList($codeUser);
        $drills= [
            "authUser"=> $clt,
            "style" => ["admin/bookingCar","admin/admin-main"],
            "Cars"=>$Cars,
        ];
        View::render("admin/bookingCar", $drills);
    }

    function Hotel()
    {
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $codeUser=$_SESSION["auth_usr"]["codeUser"];
        $showhotel = new listhotel();
        $rooms = $showhotel->GetRoom($codeUser);

        // $showCar= new Listcar();
        // $dataCar=$showCar->FunctionCar();

        $drills = [
            "authUser" => $clt,
            "js" => "flight/flight-js",
            // "style" => ["admin/hotel"],
            "style" => ["admin/admin-main", "admin/detailbook"],
            "rooms" => $rooms,
            // "dataCar"=>$dataCar
        ];
        // var_dump($codeUser);
        View::render("admin/hotel", $drills);
    }

    
    function BookingsHotel(){
        session_start();
        $clt = [];
        if (isset($_SESSION["auth_usr"])) {
            $clt = $_SESSION["auth_usr"];
        }
        $codeUser=$_SESSION["auth_usr"]["codeUser"];
        $drills= [
            "authUser"=> $clt,
            // "style"=>$styleCss,
            "style" => ["admin/bookingCar"],
        ];
        // dump($Cars);
        View::render("admin/bookingHotel", $drills);
    }

}
