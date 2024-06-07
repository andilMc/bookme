<?php

namespace src\models\hotel;

use core\sql\QueryBuilder;
use core\sql\SqlRequest;
use Exception;
use mysqli_sql_exception;
use src\models\Bookingroom;
use src\models\Hotel;
use src\models\Image;
use src\models\Room;
use src\models\User;

class Listhotel
{
    function FunctionHotel()
    {
        $sql = new SqlRequest;
        $hotels = $sql->selectAll(new Hotel());
        $data = [];

        if (!empty($hotels)) {
            foreach ($hotels as $hotel) {
                $codeHtl = $hotel->getCodeHotel();
                $rooms = $sql->selectBy(new Room(), "codeHotel='$codeHtl'");

                if (!empty($rooms)) {
                    $minPriceRoom = array_reduce($rooms, function($carry, $room) {
                        $r = ($carry === null || $room->getPrice() < $carry->getPrice()) ? $room : $carry;
                        return $r;
                    });

                    $codeRoom = $minPriceRoom->getCodeRoom();
                    // Récupérer les images associées
                    $imgs = $sql->selectBy(new Image(), "codeOwner= '$codeRoom'");

                    // Construire le tableau associatif
                    $tab = ["room" => $minPriceRoom, "hotel" => $hotel, "img" => $imgs];
                    $data[] = $tab;
                }
            }
        }
        $sql->close();
        return $data;
    }

    function searchHotel($country, $minPrice, $maxPrice)
    {
        $q = new QueryBuilder();
        $sql = new SqlRequest;
        $where = ($country != null) ? "hotel.country='$country' AND room.price BETWEEN $minPrice AND $maxPrice" : "room.price BETWEEN $minPrice AND $maxPrice";
        $data = [];
        $hotels = $q->select("DISTINCT hotel.*")
            ->table("hotel")
            ->join("room", "hotel.codeHotel = room.codeHotel")
            ->where($where)
            ->get();
        if (!empty($hotels)) {
            foreach ($hotels as $hotel) {
                $htl = new Hotel(...$hotel);
                $codeHtl = $htl->getCodeHotel();
                // Récupérer l'hôtel associé
                $rooms = $sql->selectBy(new Room(), "codeHotel='$codeHtl'");

                $minPrice = $rooms[0]->getPrice();
                $minPriceRoom = null;
                if (!empty($rooms)) {
                    foreach ($rooms as $room) {
                        if ($room->getPrice() < $minPrice) {
                            $minPrice = $room->getPrice();
                            $minPriceRoom = $room;
                        }
                    }
                }
                $codeRoom = $minPriceRoom->getCodeRoom();
                // Récupérer les images associées
                $imgs = $sql->selectBy(new Image(), "codeOwner= '$codeRoom'");

                // Construire le tableau associatif
                $tab = ["room" => $minPriceRoom, "hotel" => $htl, "img" => $imgs];
                $data[] = $tab;
            }
        }
        $sql->close();
        return $data;
    }

    static function getRooms($code)
    {
        $q = new SqlRequest();
        $r = $q->selectBy(new Room(), "codeHotel = '$code'");
        $q->close();
        return $r;
    }

    static function searchRooms($codeHtl, $adult, $children)
    {
        $q = new SqlRequest();
        if ($children == 0 && $adult > 0) {

            $r = $q->selectBy(new Room(), "codeHotel = '$codeHtl' AND maxPerson = $adult");
            $q->close();
            return $r;
        } else if ($adult == 0 && $children > 0) {

            $r = $q->selectBy(new Room(), "codeHotel = '$codeHtl' AND children = $children");
            $q->close();
            return $r;
        } else if ($adult <= 0 && $children <= 0) {
            $q->close();
            return [];
        } else {
            $r = $q->selectBy(new Room(), "codeHotel='$codeHtl' AND maxPerson = $adult AND children = $children");
            $q->close();
            return $r;
        }
    }

    static function AddRoom($idAvailable, $price, $type, $Roomnbr, $codehtl, $description, $coderoom, $wifi, $bedSize, $maxPerson, $children, $breackfast, $path)
    {
        // try {
        $q = new SqlRequest();
        $result1 = $q->insert(new Room(Null, $idAvailable, $price, $type, $Roomnbr, $codehtl, $description, $coderoom, "$wifi", $bedSize, $maxPerson, $children, "$breackfast"));
        $result2 = $q->insert(new Image(Null, $path, $coderoom));
        // var_dump($path);
        $q->close();
        return $result1;
    }


    static function mybookingsHotel($codeClt)
    {
        $q = new SqlRequest();
        $data2 = [];
        $results = $q->selectBy(new Bookingroom(), "codeClient='$codeClt'");

        if (!empty($results)) {
            foreach ($results as $result) {
                $codeRoom = $result->getcodeRoom();
                $room = $q->selectBy(new Room(), "codeRoom='$codeRoom'");

                $imgs = $q->selectBy(new Image(), "codeOwner='$codeRoom'");
                if (!empty($imgs)) {
                    $img = $imgs[0]->getPathImg();
                    $tab = [
                        "rentalHotel" => $result,
                        "room" => $room[0],
                        "img" => $img
                    ];
                    $data2[] = $tab;
                }
            }
        }
        // var_dump($data2);
        return $data2;
    }

    static function ConfirmBookingHotel($coderoom, $codeClt)
    {
        $q = new SqlRequest();
        $data2 = [];
        $room = $q->selectBy(new Room(), "codeRoom ='$coderoom'");
        $client = $q->selectBy(new User(), "codeUser = '$codeClt'");
        $imgs = $q->selectBy(new Image(), "codeOwner='$coderoom'");
        if (!empty($imgs)) {
            $img = $imgs[0]->getPathImg();
            $tab = [
                "imgs" => $imgs[0],
                "client" => $client[0],
                "room" => $room[0]
            ];
            $data2[] = $tab;
        }
        //     }
        // }
        // return $data2;
        // var_dump($results);
        return $data2;
    }

    static function SaveHotelRent($checkInDate, $checkOutDate, $comment, $codeClt, $codeRoom, $customerName, $confirmed)
    {
        $q = new SqlRequest();
        $result = $q->insert(new Bookingroom(Null, $checkInDate, $checkOutDate, $comment, $codeClt, $codeRoom, $customerName, $confirmed));
        // var_dump($result);
        $q->close();
        return $result;
    }

    function GetRoom($codeUser)
    {
        $q = new QueryBuilder();
        try {
            // $result = $q->select("*")
            //             ->table("room")
            // ->join("hotel", "room.codeHotel = hotel.codeHotel")
            // ->join("image", "room.codeRoom = image.codeOwner")
            // ->join("user", "hotel.codeUser = user.codeUser")
            // ->where("user.codeUser = '$codeUser'")
            // ->get();
            $htlCode = $q->select("*")->table("hotel")->where("hotel.codeUser= '$codeUser'")->get()[0];
            // dump($htlCode);
            $code = $htlCode['codeHotel'];
            $result = $q->select("*")->table("room")
                ->join("image", "room.codeRoom = image.codeOwner")
                ->where("room.codeHotel='$code'")->get();
            // dump($result);

            // exit;

            if (!empty($result)) {
                return $result;
            } else {
                var_dump("not fund");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
