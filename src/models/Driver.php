<?php 
        namespace src\models;
        class Driver 
        {
            
        //======================== Variable =======================//
        
        private $codeDriver;
           private $drivingLisence;
           
        //======================== Constructor =======================//
        function __construct($codeDriver = null,$drivingLisence = null) {
            $this->codeDriver = $codeDriver;
                $this->drivingLisence = $drivingLisence;
                }
        
        //======================== Methods =======================//
        
        public function getCodeDriver(){
                return $this->codeDriver;
            }
            
            public function setCodeDriver($codeDriver){
                $this->codeDriver=$codeDriver;
            }
            public function getDrivingLisence(){
                return $this->drivingLisence;
            }
            
            public function setDrivingLisence($drivingLisence){
                $this->drivingLisence=$drivingLisence;
            }
            
        }
        
        