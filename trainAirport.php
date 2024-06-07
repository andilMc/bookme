<?php

use src\models\custom\Airport;

require_once("./core/autoload.php");
require_once("./vendor/autoload.php");

function exist($db, $id)
{
    $indice = array_search($id, array_column($db, "id"));

    if ($indice !== false) {
        return true;
    } else {
        return false;
    }
}
$lettre = explode(" ", "a b c d e f g h i j k l m n o p q r s t u v w x y z");
foreach ($lettre as $l) {
//     echo $l;
    $results = Airport::get($l);
    if ($results != null) {
        $json = file_get_contents("./public/js/api/airport.json");
        $db = (array)json_decode($json);
    
        foreach ($results as $value) {
            $airport =  (array) $value;
            $id = $airport["id"];
            if (!empty($db)) {
                if (!exist($db, $id)) {
                    $tuple = ["id" => $airport["id"], "data" => $airport];
                    $db[] = $tuple;
                }
            } else {
                $tuple = ["id" => $airport["id"], "data" => $airport];
                $db[] = $tuple;
            }
        }
        $json = json_encode($db);
        if(file_put_contents("./public/js/api/airport.json",$json)){
            echo $l." => done \n";
        }
        sleep(5);
    }
   
 
}
