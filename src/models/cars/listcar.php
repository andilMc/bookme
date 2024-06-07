<?php

namespace src\models\cars;

use core\file\File;
use core\sql\QueryBuilder;
use core\sql\SqlRequest;
use src\models\Car;
use src\models\Image;
use src\models\Rentalcar;
use src\models\User;
use Symfony\Component\VarDumper\Caster\ImagineCaster;

class Listcar
{

    function FunctionCar()
    {
        $sql = new SqlRequest;
        $cars = $sql->selectAll(new Car());
        $data = [];

        foreach ($cars as $car) {
            $codeCar = $car->getCodeCar();
            $matchingCars = $sql->selectBy(new Car(), "codeCar='$codeCar'");

            if (!empty($matchingCars)) {
                $minPriceCar = $matchingCars[0];
                $codeCar = $minPriceCar->getCodeCar();
                $imgs = $sql->selectBy(new Image(), "codeOwner='$codeCar'");

                if (!empty($imgs)) {
                    $img = $imgs[0]->getPathImg();
                    $tab = ["car" => $minPriceCar, "img" => $img];
                    $data[] = $tab;
                }
            }
        }

        return $data;
    }



    static function getcar($code)
    {
        $q = new SqlRequest();
        return $q->selectBy(new Car(), "codeCar = '$code'");
    }

    static function getImgcar($code)
    {
        $q = new SqlRequest();
        return $q->selectBy(new Image(), "codeOwner = '$code'");
    }

    static function getCars($codeUser)
    {
        $q = new QueryBuilder();
        $codeCarAgency = $q->select("codeCarAgency")
            ->table("caragency")
            ->where("codeUser='$codeUser'")
            ->get()[0]["codeCarAgency"];
        $_SESSION["auth_usr"]["codeCarAgency"] = $codeCarAgency;
        $cars = $q->select("*")->table("car")->where("car.codeCarAgency='$codeCarAgency'")->get();
        $list_car = [];
        foreach ($cars as $car) {
            $img = $q->select("*")->table("image")->where("codeOwner='" . $car["codeCar"] . "'")->get();
            $car["img"] = $img[0];
            $imgNbr = count($img);
            $extraImg = [];
            if ($imgNbr > 1) {
                for ($i = 1; $i < $imgNbr; $i++) {
                    $extraImg[] = $img[$i];
                }
            }

            if (!empty($car["extraImg"])) {
                $car["extraImg"] = $extraImg;
            }

            $list_car[] = $car;
        }
        return array_reverse($list_car);
    }

    static function UpdateMainImgCar($codeUser)
    {

        $idImg = $_POST["idImg"];
        $codeOwner = $_POST["codeOwner"];
        $img = $_FILES["img"];
        if (!empty($img["name"])) {
            $img["name"] = $codeOwner . "_carImg." . pathinfo($img["name"], PATHINFO_EXTENSION);
            $path = File::upload($img, __DIR__ . "/../../../public/upload/$codeUser/crAgency/", ["jpeg", "jpg", "png"]);
            if (is_string($path)) {
                $q = new QueryBuilder();
                $url_img = "/upload/$codeUser/crAgency/" . $img["name"];
                $q->table("image")->where("id='$idImg'")->update(["pathImg" => $url_img]);
                // dump($path);
                // exit;
                header("Location:" . base_url . "/dashboard/car#m=modal-$codeOwner");
            } else {
                dump("error");
            }
        }
    }

    function FunctionSearchCar($keywords)
    {
        $sql = new SqlRequest;
        $data = [];

        $matchingCars = $sql->selectAll(new Car());
        if (!empty($matchingCars)) {
            $rec = new recommandationCar();

            $carNorm = [];
            $similarCars = [];

            foreach ($matchingCars as $car) {
                $carNorm[] = $rec->norm_description($car);
            }
            $indexes = $rec->recommand($keywords, $carNorm);
            foreach ($indexes as $index) {
                $similarCars[] = $matchingCars[$index];
            }

            foreach ($similarCars as $car) {
                $codeCar = $car->getCodeCar();
                $imgs = $sql->selectBy(new Image(), "codeOwner='$codeCar'");
                if (!empty($imgs)) {
                    $img = $imgs[0]->getPathImg();
                    $tab = ["car" => $car, "img" => $img];
                    $data[] = $tab;
                }
            }
        } else {
            return null;
        }

        return $data;
    }

    static function AddCar($brand, $model, $licence_plate, $price, $driverPrice, $type, $codeCar, $img, $description, $codeCarAgency, $yearIssue, $fuelType, $transmission, $color)
    {
        $q = new SqlRequest();
        $result1 =  $q->insert(new Car(Null, $brand, $model, $licence_plate, $price, $driverPrice, $type, $codeCar, $description, $codeCarAgency, $yearIssue, $fuelType, $transmission, $color));

        $img["name"] = $codeCar . "_carImg." . pathinfo($img["name"], PATHINFO_EXTENSION);
        $codeUser = $_SESSION["auth_usr"]["codeUser"];
        $path = __DIR__ . "/../../../public/upload/$codeUser/crAgency/";
        $path = File::upload($img, $path, ["jpeg", "jpg", "png"]);
        // insert dans le bd
        $url = "/upload/$codeUser/crAgency/" . $img["name"];
        $result2 = $q->insert(new Image(Null, $url, $codeCar));
        $q->close();
        return $result1;
    }


    static function mybookingsCar($codeClt)
    {
        $q = new SqlRequest();
        $data = [];
        $results = $q->selectBy(new Rentalcar(), "codeClient='$codeClt'");

        if (!empty($results)) {
            foreach ($results as $result) {
                $codeCar = $result->getIdCar();
                $cars = $q->selectBy(new Car(), "codeCar='$codeCar'");

                $imgs = $q->selectBy(new Image(), "codeOwner='$codeCar'");
                if (!empty($imgs)) {
                    $img = $imgs[0]->getPathImg();
                    $tab = [
                        "rentalCar" => $result,
                        "car" => $cars[0],
                        "img" => $img
                    ];
                    $data[] = $tab;
                }
            }
        } 

        return $data;
    }

    function bookingsList($codeUser)
    {
        $q = new QueryBuilder();
        $results = $q->select("*")->table("rentalcar")->join("car", " rentalcar.idCar = car.codeCar")->join("caragency", "car.codeCarAgency = caragency.codeCarAgency")->join("user", "caragency.codeUser = user.codeUser")->join("image", "car.codeCar = image.codeOwner")->where("user.codeUser = '$codeUser'")->get();

        if (!empty($results)) {
            return $results;
        } else {
            return null;
        }
    }
}
