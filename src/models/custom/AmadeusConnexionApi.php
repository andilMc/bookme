<?php
namespace src\models\custom;

use Amadeus\Amadeus;

class AmadeusConnexionApi
{
    static function getConnexion() : Amadeus {
        return Amadeus::builder("########","##########")->build();
    }
}
