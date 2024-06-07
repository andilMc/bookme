<?php 
        namespace src\models;
        class Car 
        {
            
        //======================== Variable =======================//
        
        private $id_car;
           private $make;
           private $model;
           private $license_plate;
           private $price_per_day;
           private $driverPrice;
           private $typeCar;
           private $codeCar;
           private $description;
           private $codeCarAgency;
           private $yearIssue;
           private $fuelType;
           private $transmission;
           private $color;
           
        //======================== Constructor =======================//
        function __construct($id_car = null,$make = null,$model = null,$license_plate = null,$price_per_day = null,$driverPrice = null,$typeCar = null,$codeCar = null,$description = null,$codeCarAgency = null,$yearIssue = null,$fuelType = null,$transmission = null,$color = null) {
            $this->id_car = $id_car;
                $this->make = $make;
                $this->model = $model;
                $this->license_plate = $license_plate;
                $this->price_per_day = $price_per_day;
                $this->driverPrice = $driverPrice;
                $this->typeCar = $typeCar;
                $this->codeCar = $codeCar;
                $this->description = $description;
                $this->codeCarAgency = $codeCarAgency;
                $this->yearIssue = $yearIssue;
                $this->fuelType = $fuelType;
                $this->transmission = $transmission;
                $this->color = $color;
                }
        
        //======================== Methods =======================//
        
        public function getId_car(){
                return $this->id_car;
            }
            
            public function setId_car($id_car){
                $this->id_car=$id_car;
            }
            public function getMake(){
                return $this->make;
            }
            
            public function setMake($make){
                $this->make=$make;
            }
            public function getModel(){
                return $this->model;
            }
            
            public function setModel($model){
                $this->model=$model;
            }
            public function getLicense_plate(){
                return $this->license_plate;
            }
            
            public function setLicense_plate($license_plate){
                $this->license_plate=$license_plate;
            }
            public function getPrice_per_day(){
                return $this->price_per_day;
            }
            
            public function setPrice_per_day($price_per_day){
                $this->price_per_day=$price_per_day;
            }
            public function getDriverPrice(){
                return $this->driverPrice;
            }
            
            public function setDriverPrice($driverPrice){
                $this->driverPrice=$driverPrice;
            }
            public function getTypeCar(){
                return $this->typeCar;
            }
            
            public function setTypeCar($typeCar){
                $this->typeCar=$typeCar;
            }
            public function getCodeCar(){
                return $this->codeCar;
            }
            
            public function setCodeCar($codeCar){
                $this->codeCar=$codeCar;
            }
            public function getDescription(){
                return $this->description;
            }
            
            public function setDescription($description){
                $this->description=$description;
            }
            public function getCodeCarAgency(){
                return $this->codeCarAgency;
            }
            
            public function setCodeCarAgency($codeCarAgency){
                $this->codeCarAgency=$codeCarAgency;
            }
            public function getYearIssue(){
                return $this->yearIssue;
            }
            
            public function setYearIssue($yearIssue){
                $this->yearIssue=$yearIssue;
            }
            public function getFuelType(){
                return $this->fuelType;
            }
            
            public function setFuelType($fuelType){
                $this->fuelType=$fuelType;
            }
            public function getTransmission(){
                return $this->transmission;
            }
            
            public function setTransmission($transmission){
                $this->transmission=$transmission;
            }
            public function getColor(){
                return $this->color;
            }
            
            public function setColor($color){
                $this->color=$color;
            }
            
        }
        
        