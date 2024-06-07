<?php

namespace src\controllers\api;

use Rentalcar;
use core\template\View;
use core\sql\SqlRequest;
use core\sql\QueryBuilder;
use src\controllers\Utils;
use src\models\utils\Mail;
use src\models\utils\Transaction;
use Amadeus\Exceptions\ResponseException;
use src\models\custom\AmadeusConnexionApi;

class Flight
{
    /**
     * @Methode("GET")
     */
    function selectFlight($offre)
    {
        session_start();
        if (Utils::isLogin() && !empty($offre)) {
            $drills = [
                "authUser" => $_SESSION["auth_usr"],
                "offre" => json_decode($offre),
                "js" => "Controllers/country",

            ];
            View::render("flightInfo", $drills);
        } else {
            header("Location: " . base_url . "/login");
        }
    }

    /**
     * @Methode("POST")
     */
    function flightOrder($offre, $person)
    {
        session_start();
        if (Utils::isLogin() && !empty($offre) && !empty($person)) {
            // $amadeus = AmadeusConnexionApi::getConnexion();
            // $body = '{"data": {"type": "flight-offers-pricing","flightOffers": [' . $offre . ']}}';
            // $pricingResponse = $amadeus->getShopping()->getFlightOffers()->getPricing()->post($body);
            // $travelers = [];
            // $id = 1;
            // foreach ($person as $traveler) {
            //     $travelers[] = [
            //         'id' => $id,
            //         'dateOfBirth' => $traveler["year"]."-".$traveler["month"]."-".$traveler["day"],
            //         'name' => [
            //             'firstName' => $traveler["fname"],
            //             'lastName' => $traveler["lname"]
            //         ],
            //         'gender' =>strtoupper($traveler["gender"]),
            //         'documents' => [
            //             [
            //                 'documentType' => 'PASSPORT',
            //                 'number' => $traveler["pnum"],
            //                 'expiryDate' => $traveler["yearExp"]."-".$traveler["monthExp"]."-".$traveler["dayExp"],
            //                 'issuanceCountry' => $traveler["countryIssue"],
            //                 'nationality' => $traveler["country"],
            //                 'holder' => true
            //             ]
            //         ]
            //     ];
            //     $id++;
            // }

            // $orderBody = json_encode(
            //     [
            //         'data' => [
            //             'type' => 'flight-order',
            //             'flightOffers' => $pricingResponse->getFlightOffers(),
            //             'travelers' => $travelers
            //         ]
            //     ]
            // );
            // try {
            //     $orderResponse = $amadeus->getBooking()->getFlightOrders()->post($orderBody);

            // } catch (ResponseException $e) {
            //     dump($e->getMessage());

            // }

            $drills = [
                "authUser" => $_SESSION["auth_usr"],
                "offre" => json_decode($offre),
                "style" => ["flight", "car"],
                "js" => [
                    "Controllers/modal",
                    "Controllers/jquery.payment",
                    "Controllers/payment"
                ]
            ];
            View::render("payment-flight", $drills);

            // dump($person);
        } else {
            header("Location: " . base_url . "/404");
        }
    }

    function confirmbookFlight()
    {
        session_start();
        if (Utils::isLogin()) {
            $clt = $_SESSION["auth_usr"];
            $numCard = str_replace(" ", "", $_POST["cardNumber"]);
            $clientAddress = $_POST["clientAddress"];
            $clientCity = $_POST["clientCity"];
            $clientState = $_POST["clientState"];
            $clientZip = $_POST["clientZip"];
            $cardHolderName = $_POST["cardHolderName"];
            $exp = str_replace(" ", "", $_POST["exp"]);
            $cvc = $_POST["cvc"];
            // $idRent = $_POST["cfCar"];

            $sql = new SqlRequest();
            $r = Transaction::transaction($clt["codeUser"], $clt["email"], $numCard, $clientAddress, $clientCity, $clientState, $clientZip, $cardHolderName, $exp, $cvc);
            if ($r) {
                // $q = new QueryBuilder();
                // $q->table("rentalcar")->where("idRental=$idRent")->update(["confirmed" => 1]);
                $drills = [
                    "authUser" => $clt,
                    "style" => "car",
                    "cf_car" => true
                ];
                Mail::sendMail($clt["email"], $clt["fullName"], "Your Flight Booking is done ");
                View::render("bookingConfirm", $drills);
            } else {
                dump("Transaction Failed");
            }
        }
    }
}
