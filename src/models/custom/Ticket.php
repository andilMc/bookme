<?php
namespace src\models\custom;

use function PHPSTORM_META\type;

class Ticket 
{
    private $originLocationCode;
    private $destinationLocationCode;
    private $departureDate;
    private $returnDate;
    private $adults;
    private $children;
    private $infants;
    private $travelClass;
    private $includedAirlineCodes;
    private $excludedAirlineCodes;
    private $nonStop;
    private $maxPrice;
    private $currencyCode;
    private $max;

    public function __construct($originLocationCode = null, $destinationLocationCode = null, $departureDate = null, $returnDate = null, $adults = null, $children = null, $infants = null, $travelClass = null, $includedAirlineCodes = null, $excludedAirlineCodes = null, $nonStop = null, $currencyCode = null,$maxPrice=null,$max=null) {
        $this->originLocationCode = $originLocationCode;
        $this->destinationLocationCode = $destinationLocationCode;
        $this->departureDate = $departureDate;
        $this->returnDate = $returnDate;
        $this->adults = $adults;
        $this->children = $children;
        $this->infants = $infants;
        $this->travelClass = $travelClass;
        $this->includedAirlineCodes = $includedAirlineCodes;
        $this->excludedAirlineCodes = $excludedAirlineCodes;
        $this->nonStop = $nonStop;
        $this->maxPrice = $maxPrice;
        $this->currencyCode = $currencyCode;
        $this->max = $max;
    }

    
    function roundTripTicket() {
        $amadeus = AmadeusConnexionApi::getConnexion();
        //$way = null, $originLocationCode = null, $destinationLocationCode = null, $departureDate = null, $returnDate = null, $adults = null, $children = null, $infants = null, $travelClass = null, $includedAirlineCodes = null, $excludedAirlineCodes = null, $nonStop = null, $currencyCode = null,$maxPrice=null,$max=null
        $dataToSend = [
            "originLocationCode"=>$this->originLocationCode,
            "destinationLocationCode"=>$this->destinationLocationCode,
            "departureDate"=>$this->departureDate,
            "returnDate"=> $this->returnDate,
            "adults"=> $this->adults,
            "infants"=> $this->infants,
            "children"=> $this->children,
            "travelClass"=> $this->travelClass,
            "includedAirlineCodes"=> $this->includedAirlineCodes,
            "excludedAirlineCodes"=> $this->excludedAirlineCodes,
            "nonStop"=> $this->nonStop,
            "maxPrice"=> $this->maxPrice,
            "currencyCode"=> $this->currencyCode,
            "max"=> $this->max,
        ];
        try {
            $flightOffers=$amadeus->getShopping()->getFlightOffers()->get($dataToSend);
            return (isset($flightOffers[0]))?[$flightOffers[0],1]:[$flightOffers,0];

        } catch (\Throwable $th) {
            $pos=strpos($th->getMessage(),"{");
            $msg = substr($th->getMessage(),$pos);
            if (isset(json_decode($msg)->errors)) {
                $errors = json_decode($msg)->errors;
                return [$errors,0];
            } else {
                return [$th->getMessage(),0];
            }
            
            
        }
    }

    function oneWayTicket() {
        $amadeus = AmadeusConnexionApi::getConnexion();
        $dataToSend = [
            "originLocationCode"=>$this->originLocationCode,
            "destinationLocationCode"=>$this->destinationLocationCode,
            "departureDate"=>$this->departureDate,
            "adults"=> $this->adults,
            "infants"=> $this->infants,
            "children"=> $this->children,
            "travelClass"=> $this->travelClass,
            "includedAirlineCodes"=> $this->includedAirlineCodes,
            "excludedAirlineCodes"=> $this->excludedAirlineCodes,
            "nonStop"=> $this->nonStop,
            "maxPrice"=> $this->maxPrice,
            "currencyCode"=> $this->currencyCode,
            "max"=> $this->max,
        ];
        try {
            $flightOffers=$amadeus->getShopping()->getFlightOffers()->get($dataToSend);
            return (isset($flightOffers[0]))?[$flightOffers[0],1]:[$flightOffers,0];

        } catch (\Throwable $th) {
            $pos=strpos($th->getMessage(),"{");
            $msg = substr($th->getMessage(),$pos);
            if (isset(json_decode($msg)->errors)) {
                $errors = json_decode($msg)->errors;
                return [$errors,0];
            } else {
                return [$th->getMessage(),0];
            }
            
            
        }
    }
}
