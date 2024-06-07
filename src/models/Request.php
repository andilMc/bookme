<?php 
        namespace src\models;
        class Request 
        {
            
        //======================== Variable =======================//
        
        private $ID;
           private $service;
           private $companyName;
           private $country;
           private $bNumber;
           private $license;
           private $insurance;
           private $codeRequest;
           private $valid;
           private $codeUser;
           private $city;
           
        //======================== Constructor =======================//
        function __construct($ID = null,$service = null,$companyName = null,$country = null,$bNumber = null,$license = null,$insurance = null,$codeRequest = null,$valid = null,$codeUser = null,$city = null) {
            $this->ID = $ID;
                $this->service = $service;
                $this->companyName = $companyName;
                $this->country = $country;
                $this->bNumber = $bNumber;
                $this->license = $license;
                $this->insurance = $insurance;
                $this->codeRequest = $codeRequest;
                $this->valid = $valid;
                $this->codeUser = $codeUser;
                $this->city = $city;
                }
        
        //======================== Methods =======================//
        
        public function getID(){
                return $this->ID;
            }
            
            public function setID($ID){
                $this->ID=$ID;
            }
            public function getService(){
                return $this->service;
            }
            
            public function setService($service){
                $this->service=$service;
            }
            public function getCompanyName(){
                return $this->companyName;
            }
            
            public function setCompanyName($companyName){
                $this->companyName=$companyName;
            }
            public function getCountry(){
                return $this->country;
            }
            
            public function setCountry($country){
                $this->country=$country;
            }
            public function getBNumber(){
                return $this->bNumber;
            }
            
            public function setBNumber($bNumber){
                $this->bNumber=$bNumber;
            }
            public function getLicense(){
                return $this->license;
            }
            
            public function setLicense($license){
                $this->license=$license;
            }
            public function getInsurance(){
                return $this->insurance;
            }
            
            public function setInsurance($insurance){
                $this->insurance=$insurance;
            }
            public function getCodeRequest(){
                return $this->codeRequest;
            }
            
            public function setCodeRequest($codeRequest){
                $this->codeRequest=$codeRequest;
            }
            public function getValid(){
                return $this->valid;
            }
            
            public function setValid($valid){
                $this->valid=$valid;
            }
            public function getCodeUser(){
                return $this->codeUser;
            }
            
            public function setCodeUser($codeUser){
                $this->codeUser=$codeUser;
            }
            public function getCity(){
                return $this->city;
            }
            
            public function setCity($city){
                $this->city=$city;
            }
            
        }
        
        