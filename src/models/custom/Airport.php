<?php

namespace src\models\custom;

use core\Http\HttpRequest;

class Airport
{
    static function get($keyword)
    {

        $amadeus = AmadeusConnexionApi::getConnexion();
        $response = $amadeus->getReferenceData()->getLocations()->get([
            'subType' => 'CITY,AIRPORT',
            "keyword" => "$keyword"
        ]);
        if (!empty($response)) {
            $jsonArray = json_decode($response[0]->getResponse()->getBody());
            $result = $jsonArray->data;
            return $result;
        } else {
            return null;
        }
    }

    static function getCode($code)
    {

        $amadeus = AmadeusConnexionApi::getConnexion();
        $response = $amadeus->getReferenceData()->getLocation($code)->get();
        // $curl = curl_init();
        // curl_setopt_array($curl, [
        //     CURLOPT_URL => "https://airport-info.p.rapidapi.com/airport?iata=$code",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     CURLOPT_HTTPHEADER => [
        //         "X-RapidAPI-Host: airport-info.p.rapidapi.com",
        //         "X-RapidAPI-Key: 145a223c42mshe5e000061c08d0bp111e05jsnf69c2f938e9f"
        //     ],
        // ]);

        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);

        // if ($err) {
        //     return $err;
        // } else {
            return $response;
        // }
        
    }
}
