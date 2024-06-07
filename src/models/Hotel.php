<?php 
        namespace src\models;
        class Hotel 
        {
            
        //======================== Variable =======================//
        
        private $codeHotel;
           private $hotelName;
           private $type;
           private $localization;
           private $description;
           private $country;
           private $city;
           private $lati_long;
           private $codeUser;
           
        //======================== Constructor =======================//
        function __construct($codeHotel = null,$hotelName = null,$type = null,$localization = null,$description = null,$country = null,$city = null,$lati_long = null,$codeUser = null) {
            $this->codeHotel = $codeHotel;
                $this->hotelName = $hotelName;
                $this->type = $type;
                $this->localization = $localization;
                $this->description = $description;
                $this->country = $country;
                $this->city = $city;
                $this->lati_long = $lati_long;
                $this->codeUser = $codeUser;
                }
        
        //======================== Methods =======================//
        
        public function getCodeHotel(){
                return $this->codeHotel;
            }
            
            public function setCodeHotel($codeHotel){
                $this->codeHotel=$codeHotel;
            }
            public function getHotelName(){
                return $this->hotelName;
            }
            
            public function setHotelName($hotelName){
                $this->hotelName=$hotelName;
            }
            public function getType(){
                return $this->type;
            }
            
            public function setType($type){
                $this->type=$type;
            }
            public function getLocalization(){
                return $this->localization;
            }
            
            public function setLocalization($localization){
                $this->localization=$localization;
            }
            public function getDescription(){
                return $this->description;
            }
            
            public function setDescription($description){
                $this->description=$description;
            }
            public function getCountry(){
                return $this->country;
            }
            
            public function setCountry($country){
                $this->country=$country;
            }
            public function getCity(){
                return $this->city;
            }
            
            public function setCity($city){
                $this->city=$city;
            }
            public function getLati_long(){
                return $this->lati_long;
            }
            
            public function setLati_long($lati_long){
                $this->lati_long=$lati_long;
            }
            public function getCodeUser(){
                return $this->codeUser;
            }
            
            public function setCodeUser($codeUser){
                $this->codeUser=$codeUser;
            }
            
        }
        
        