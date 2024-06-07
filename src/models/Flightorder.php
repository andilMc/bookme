<?php 
        namespace src\models;
        class Flightorder 
        {
            
        //======================== Variable =======================//
        
        private $id;
           private $flight_id;
           private $flight_offer_price_data;
           private $complet;
           
        //======================== Constructor =======================//
        function __construct($id = null,$flight_id = null,$flight_offer_price_data = null,$complet = null) {
            $this->id = $id;
                $this->flight_id = $flight_id;
                $this->flight_offer_price_data = $flight_offer_price_data;
                $this->complet = $complet;
                }
        
        //======================== Methods =======================//
        
        public function getId(){
                return $this->id;
            }
            
            public function setId($id){
                $this->id=$id;
            }
            public function getFlight_id(){
                return $this->flight_id;
            }
            
            public function setFlight_id($flight_id){
                $this->flight_id=$flight_id;
            }
            public function getFlight_offer_price_data(){
                return $this->flight_offer_price_data;
            }
            
            public function setFlight_offer_price_data($flight_offer_price_data){
                $this->flight_offer_price_data=$flight_offer_price_data;
            }
            public function getComplet(){
                return $this->complet;
            }
            
            public function setComplet($complet){
                $this->complet=$complet;
            }
            
        }
        
        