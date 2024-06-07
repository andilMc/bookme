<?php

namespace src\controllers\api;

use core\sql\QueryBuilder;
use core\sql\SqlRequest;
use core\template\View;
use src\controllers\Utils;
use src\models\Car;
use src\models\cars\Listcar;
use src\models\cars\recommandationCar;
use src\models\Rentalcar;

class CarApi
{
    function initListeCars()
    {
        $showCar = new Listcar();
        $data = $showCar->FunctionCar();
        $drills = [
            "data" => array_reverse($data)
        ];

        View::render("shared/components/listeCars", $drills);
    }

    function searchCars()
    {

        if (isset($_GET["carSearch"]) && !empty(trim($_GET["carSearch"]))) {
            $modelCars = new Listcar();
            $data = $modelCars->FunctionSearchCar($_GET["carSearch"]);

            $drills = [
                "data" => array_reverse($data)
            ];

            View::render("shared/components/listeCars", $drills);
        } elseif (isset($_GET["carSearch"]) && empty(trim($_GET["carSearch"]))) {
            $this->initListeCars();
        }
    }

    function recommandCars($usr)
    {
        $sql = new SqlRequest();
        $q = new QueryBuilder();
        $rcmd = new recommandationCar();
        $cars = array_reverse($sql->selectAll(new Car()));
        if (!empty($usr)) {
            $rent_car = $sql->selectBy(new Rentalcar(), "codeClient = '$usr'");
            if (!empty($rent_car)) {
                $i = random_int(0, (count($rent_car) - 1));
                $codeRentCar = $rent_car[$i]->getIdCar();
                $t_car = $rcmd->findCarByCode($cars, $codeRentCar);
                $desc_target = $rcmd->norm_description($t_car);
                $dataset = [];
                foreach ($cars as $car) {
                    $dataset[] = $rcmd->norm_description($car);
                }
                $indexes = $rcmd->personalRecommandarion($desc_target, $dataset);
                $data = [];
                foreach ($indexes as $index) {
                    $codeCar = $cars[$index]->getCodeCar();
                    $img = $q->select("pathImg")->table("image")->where("codeOwner = '$codeCar'")->get()[0];

                    $data[] = ["car" => $cars[$index], "img" => $img];
                }

                $drills = [
                    "data" => $data
                ];

                View::render("shared/components/recommand-cars", $drills);
            } else {
                $rent_car = $q->select("idCar")->table("rentalcar")->get();
                $data = [];
                $rcmddId = $rcmd->popularCars($rent_car);
                $id1 = $rcmddId[0]["idCar"];
                $id2 = $rcmddId[1]["idCar"];
                $id3 = $rcmddId[2]["idCar"];
                $cars = $sql->selectBy(new Car(), "codeCar IN('$id1','$id2','$id3')");
                $data = [];
                foreach ($cars as $car) {
                    $codeCar = $car->getCodeCar();
                    $img = $q->select("pathImg")->table("image")->where("codeOwner = '$codeCar'")->get()[0];

                    $data[] = ["car" => $car, "img" => $img];
                }
                $drills = [
                    "data" => $data
                ];

                View::render("shared/components/recommand-cars", $drills);
            }
        } else {
            $rent_car = $q->select("idCar")->table("rentalcar")->get();
            $data = [];
            $rcmddId = $rcmd->popularCars($rent_car);
            $id1 = $rcmddId[0]["idCar"];
            $id2 = $rcmddId[1]["idCar"];
            $id3 = $rcmddId[2]["idCar"];
            $cars = $sql->selectBy(new Car(), "codeCar IN('$id1','$id2','$id3')");
            $data = [];
            foreach ($cars as $car) {
                $codeCar = $car->getCodeCar();
                $img = $q->select("pathImg")->table("image")->where("codeOwner = '$codeCar'")->get()[0];

                $data[] = ["car" => $car, "img" => $img];
            }
            $drills = [
                "data" => $data
            ];

            View::render("shared/components/recommand-cars", $drills);
        }
        $sql->close();
    }
}
