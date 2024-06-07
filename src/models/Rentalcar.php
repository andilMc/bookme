<?php 
        namespace src\models;
        class Rentalcar 
        {
            
        //======================== Variable =======================//
        
        private $idRental;
           private $idCar;
           private $codeClient;
           private $codeDriver;
           private $pickupDate;
           private $returnDate;
           private $paymentMode;
           private $confirmed;
           private $needDriver;
           private $totalPrice;
           private $customerName;
           private $Address;
           
        //======================== Constructor =======================//
        function __construct($idRental = null,$idCar = null,$codeClient = null,$codeDriver = null,$pickupDate = null,$returnDate = null,$paymentMode = null,$confirmed = null,$needDriver = null,$totalPrice = null,$customerName = null,$Address = null) {
            $this->idRental = $idRental;
                $this->idCar = $idCar;
                $this->codeClient = $codeClient;
                $this->codeDriver = $codeDriver;
                $this->pickupDate = $pickupDate;
                $this->returnDate = $returnDate;
                $this->paymentMode = $paymentMode;
                $this->confirmed = $confirmed;
                $this->needDriver = $needDriver;
                $this->totalPrice = $totalPrice;
                $this->customerName = $customerName;
                $this->Address = $Address;
                }
        
        //======================== Methods =======================//
        
        public function getIdRental(){
                return $this->idRental;
            }
            
            public function setIdRental($idRental){
                $this->idRental=$idRental;
            }
            public function getIdCar(){
                return $this->idCar;
            }
            
            public function setIdCar($idCar){
                $this->idCar=$idCar;
            }
            public function getCodeClient(){
                return $this->codeClient;
            }
            
            public function setCodeClient($codeClient){
                $this->codeClient=$codeClient;
            }
            public function getCodeDriver(){
                return $this->codeDriver;
            }
            
            public function setCodeDriver($codeDriver){
                $this->codeDriver=$codeDriver;
            }
            public function getPickupDate(){
                return $this->pickupDate;
            }
            
            public function setPickupDate($pickupDate){
                $this->pickupDate=$pickupDate;
            }
            public function getReturnDate(){
                return $this->returnDate;
            }
            
            public function setReturnDate($returnDate){
                $this->returnDate=$returnDate;
            }
            public function getPaymentMode(){
                return $this->paymentMode;
            }
            
            public function setPaymentMode($paymentMode){
                $this->paymentMode=$paymentMode;
            }
            public function getConfirmed(){
                return $this->confirmed;
            }
            
            public function setConfirmed($confirmed){
                $this->confirmed=$confirmed;
            }
            public function getNeedDriver(){
                return $this->needDriver;
            }
            
            public function setNeedDriver($needDriver){
                $this->needDriver=$needDriver;
            }
            public function getTotalPrice(){
                return $this->totalPrice;
            }
            
            public function setTotalPrice($totalPrice){
                $this->totalPrice=$totalPrice;
            }
            public function getCustomerName(){
                return $this->customerName;
            }
            
            public function setCustomerName($customerName){
                $this->customerName=$customerName;
            }
            public function getAddress(){
                return $this->Address;
            }
            
            public function setAddress($Address){
                $this->Address=$Address;
            }
            
        }
        
        