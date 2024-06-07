<?php 
        namespace src\models;
        class Caragency 
        {
            
        //======================== Variable =======================//
        
        private $codeCarAgency;
           private $carAgencyName;
           private $country;
           private $city;
           private $description;
           private $lati_long;
           private $codeUser;
           
        //======================== Constructor =======================//
        function __construct($codeCarAgency = null,$carAgencyName = null,$country = null,$city = null,$description = null,$lati_long = null,$codeUser = null) {
            $this->codeCarAgency = $codeCarAgency;
                $this->carAgencyName = $carAgencyName;
                $this->country = $country;
                $this->city = $city;
                $this->description = $description;
                $this->lati_long = $lati_long;
                $this->codeUser = $codeUser;
                }
        
        //======================== Methods =======================//
        
        public function getCodeCarAgency(){
                return $this->codeCarAgency;
            }
            
            public function setCodeCarAgency($codeCarAgency){
                $this->codeCarAgency=$codeCarAgency;
            }
            public function getCarAgencyName(){
                return $this->carAgencyName;
            }
            
            public function setCarAgencyName($carAgencyName){
                $this->carAgencyName=$carAgencyName;
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
            public function getDescription(){
                return $this->description;
            }
            
            public function setDescription($description){
                $this->description=$description;
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
        
        