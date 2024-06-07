<?php

namespace src\controllers\api;

use src\models\custom\Airport;
use src\models\custom\Ticket;

class FlightApi
{
    static function exist($db, $id)
    {
        $indice = array_search($id, array_column($db, "id"));

        if ($indice !== false) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * @Methode("POST")
     */
    function autoCompletAirport($keyword)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        try {
            $localJson = file_get_contents(__DIR__ . "/airport.json");
            $localData = (array)json_decode($localJson);
            $response = [];
            if (!empty($localData)) {
                foreach ($localData as  $air) {
                    $air = (array) $air;
                    $data = (array)$air["data"];
                    $address = (array) $data["address"];
                    $cityName = $address["cityName"];
                    $countryName = $address["countryName"];
                    $name = $data["name"];
                    $index1 = strpos(strtoupper($name), strtoupper($keyword));
                    $index2 = strpos(strtoupper($cityName), strtoupper($keyword));
                    // $index3 = strpos(strtoupper($countryName), strtoupper($keyword));

                    if ($index1 !== false) {
                        $response[] = $air["data"];
                    } elseif ($index2 !== false) {
                        $response[] = $air["data"];
                    } 
                    // elseif ($index3 !== false) {
                    //     $response[] = $air["data"];
                    // }
                }
                if (empty($response)) {
                    $results = Airport::get($keyword);
                    if ($results != null) {
                        foreach ($results as $value) {
                            $airport =  (array) $value;
                            $id = $airport["id"];
                            if (!empty($localData)) {
                                if (!FlightApi::exist($localData, $id)) {
                                    $tuple = ["id" => $airport["id"], "data" => $airport];
                                    $localData[] = $tuple;
                                }
                            } else {
                                $tuple = ["id" => $airport["id"], "data" => $airport];
                                $localData[] = $tuple;
                            }
                        }
                        $json = json_encode($localData);
                        if (file_put_contents(__DIR__ . "/airport.json", $json)) {
                            $response = $results;
                        }
                    }
                }
            } else {
                $results = Airport::get($keyword);
                if ($results != null) {
                    foreach ($results as $value) {
                        $airport =  (array) $value;
                        $id = $airport["id"];
                        if (!empty($localData)) {
                            if (!FlightApi::exist($localData, $id)) {
                                $tuple = ["id" => $airport["id"], "data" => $airport];
                                $localData[] = $tuple;
                            }
                        } else {
                            $tuple = ["id" => $airport["id"], "data" => $airport];
                            $localData[] = $tuple;
                        }
                    }
                    $json = json_encode($localData);
                    if (file_put_contents(__DIR__ . "/airport.json", $json)) {
                       
                        foreach ($localData as  $air) {
                            $air = (array) $air;
                            $data = (array)$air["data"];
                            $address = (array) $data["address"];
                            $cityName = $address["cityName"];
                            $countryName = $address["countryName"];
                            $name = $data["name"];
                            $index1 = strpos(strtoupper($name), strtoupper($keyword));
                            $index2 = strpos(strtoupper($cityName), strtoupper($keyword));
                            // $index3 = strpos(strtoupper($countryName), strtoupper($keyword));
        
                            if ($index1 !== false) {
                                $response[] = $air["data"];
                            } elseif ($index2 !== false) {
                                $response[] = $air["data"];
                            } 
                            // elseif ($index3 !== false) {
                            //     $response[] = $air["data"];
                            // }
                        }
                    }
                }
            }

            if (!empty($response)) {
                exit(json_encode(["data" => $response, "msg" => "ok"]));
            } else {
                exit(json_encode(["msg" => "Empty"]));
            }
        } catch (\Throwable $th) {
            exit(json_encode(["msg" => "$th"]));
        }
    }

    function  searchAirportId($airport, $code)
    {
        $airport = (array) $airport;
        $data = (array)$airport["data"];
        $iataCode = $data["iataCode"];
        $index1 = strpos(strtoupper($iataCode), strtoupper($code));
        if ($index1 !== false) {
            $response[] = $airport["data"];
            return $response;
        }
    }

    function  searchAirportOnline($code)
    {
        $results = Airport::get($code);
        if ($results != null) {
            foreach ($results as $value) {
                $airport =  (array) $value;
                $id = $airport["id"];
                if (!empty($localData)) {
                    if (!FlightApi::exist($localData, $id)) {
                        $tuple = ["id" => $airport["id"], "data" => $airport];
                        $localData[] = $tuple;
                    }
                } else {
                    $tuple = ["id" => $airport["id"], "data" => $airport];
                    $localData[] = $tuple;
                }
            }

            $json = json_encode($localData);
            if (file_put_contents(__DIR__ . "/airport.json", $json)) {
                foreach ($localData as  $air) {
                    $response = $this->searchAirportId($air, $code);
                        return $response;
                }
            }
        }
    }

    function airportLocal($code)
    {
        $localJson = file_get_contents(__DIR__ . "/airport.json");
        $localData = (array)json_decode($localJson);
        $response = [1];
        if (!empty($localData)) {
            foreach ($localData as  $air) {
                $response = $this->searchAirportId($air, $code);
            }
            if (empty($response)) {
                $response = $this->searchAirportOnline($code);
            }
            return $response; 
        }else{
            $response = $this->searchAirportOnline($code);
            return $response; 
        }
    }
    /**
     * @Methode("GET")
     */
    function getAirportByCode($code)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        try {


            $response = $this->airportLocal($code);
            if ($response != null) {
                exit(json_encode(["data" => $response, "msg" => "ok"]));
            } else {
                exit(json_encode(["msg" => $response]));
            }
        } catch (\Throwable $th) {
            exit(json_encode(["msg" => "$th"]));
        }
    }

    /**
     * @Methode("GET")
     */
    function offres($way = null, $originLocationCode = null, $destinationLocationCode = null, $departureDate = null, $returnDate = null, $adults = null, $children = null, $infants = null, $travelClass = null, $includedAirlineCodes = null, $excludedAirlineCodes = null, $nonStop = null, $currencyCode = "USD", $maxPrice = null, $max = 4)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        switch ($way) {
            case 1:
                if (!empty($originLocationCode) && !empty($destinationLocationCode) && !empty($departureDate) && !empty($adults)) {
                    $tk = new Ticket($originLocationCode, $destinationLocationCode, $departureDate, $returnDate, $adults, $children, $infants, $travelClass, $includedAirlineCodes, $excludedAirlineCodes, $nonStop, $currencyCode, $maxPrice, $max);
                    $response = $tk->oneWayTicket();
                    if ($response[1] == 1) {
                        $offres = json_decode($response[0]->getResponse()->getBody())->data;
                        exit(json_encode(["data" => $offres, "msg" => 1]));
                    } else {
                        exit(json_encode(["msg" => $response[0], "date" => $departureDate]));
                    }
                }
                break;
            case 2:
                if (!empty($originLocationCode) && !empty($destinationLocationCode) && !empty($departureDate) && !empty($adults)) {
                    $tk = new Ticket($originLocationCode, $destinationLocationCode, $departureDate, $returnDate, $adults, $children, $infants, $travelClass, $includedAirlineCodes, $excludedAirlineCodes, $nonStop, $currencyCode, $maxPrice, $max);
                    $response = $tk->roundTripTicket();
                    if ($response[1] == 1) {
                        $offres = json_decode($response[0]->getResponse()->getBody())->data;
                        exit(json_encode(["data" => $offres, "msg" => 1]));
                    } else {
                        exit(json_encode(["msg" => $response[0]]));
                    }
                }
                break;
            default:
                exit(json_encode(["msg" => "way should be 1 or 2"]));
                break;
        }
    }
}
