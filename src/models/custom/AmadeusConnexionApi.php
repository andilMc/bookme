<?php
namespace src\models\custom;

use Amadeus\Amadeus;

class AmadeusConnexionApi
{
    static function getConnexion() : Amadeus {
        return Amadeus::builder("caOGGaQGllJ6njIOC5LWoBVF1FW2247i","dwD8P9ah3shVUwTO")->build();
    }
}
