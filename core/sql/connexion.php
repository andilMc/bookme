<?php
namespace core\sql;
class connexion {

      static function getConnexion(){
        include_once __DIR__."/../../config/const.php";
        $con = mysqli_connect(_HOST,_USER, _PSWD,_DB,_PORT);
        mysqli_set_charset($con, "utf8mb4");
        if($con != null){
            return $con;
        }else {
            return false;
        }

     }

}


?>