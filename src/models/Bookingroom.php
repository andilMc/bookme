<?php 
        namespace src\models;
        class Bookingroom 
        {
            
        //======================== Variable =======================//
        
        private $id;
           private $checkinDate;
           private $checkoutDate;
           private $descritption;
           private $codeClient;
           private $codeRoom;
           private $customerName;
           private $confirmed;
           
        //======================== Constructor =======================//
        function __construct($id = null,$checkinDate = null,$checkoutDate = null,$descritption = null,$codeClient = null,$codeRoom = null,$customerName = null,$confirmed = null) {
            $this->id = $id;
                $this->checkinDate = $checkinDate;
                $this->checkoutDate = $checkoutDate;
                $this->descritption = $descritption;
                $this->codeClient = $codeClient;
                $this->codeRoom = $codeRoom;
                $this->customerName = $customerName;
                $this->confirmed = $confirmed;
                }
        
        //======================== Methods =======================//
        
        public function getId(){
                return $this->id;
            }
            
            public function setId($id){
                $this->id=$id;
            }
            public function getCheckinDate(){
                return $this->checkinDate;
            }
            
            public function setCheckinDate($checkinDate){
                $this->checkinDate=$checkinDate;
            }
            public function getCheckoutDate(){
                return $this->checkoutDate;
            }
            
            public function setCheckoutDate($checkoutDate){
                $this->checkoutDate=$checkoutDate;
            }
            public function getDescritption(){
                return $this->descritption;
            }
            
            public function setDescritption($descritption){
                $this->descritption=$descritption;
            }
            public function getCodeClient(){
                return $this->codeClient;
            }
            
            public function setCodeClient($codeClient){
                $this->codeClient=$codeClient;
            }
            public function getCodeRoom(){
                return $this->codeRoom;
            }
            
            public function setCodeRoom($codeRoom){
                $this->codeRoom=$codeRoom;
            }
            public function getCustomerName(){
                return $this->customerName;
            }
            
            public function setCustomerName($customerName){
                $this->customerName=$customerName;
            }
            public function getConfirmed(){
                return $this->confirmed;
            }
            
            public function setConfirmed($confirmed){
                $this->confirmed=$confirmed;
            }
            
        }
        
        