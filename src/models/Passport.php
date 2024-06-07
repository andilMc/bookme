<?php 
        namespace src\models;
        class Passport 
        {
            
        //======================== Variable =======================//
        
        private $idPassport;
           private $fullNamePassport;
           private $numPassport;
           private $dateExpPassport;
           private $codeUser;
           
        //======================== Constructor =======================//
        function __construct($idPassport = null,$fullNamePassport = null,$numPassport = null,$dateExpPassport = null,$codeUser = null) {
            $this->idPassport = $idPassport;
                $this->fullNamePassport = $fullNamePassport;
                $this->numPassport = $numPassport;
                $this->dateExpPassport = $dateExpPassport;
                $this->codeUser = $codeUser;
                }
        
        //======================== Methods =======================//
        
        public function getIdPassport(){
                return $this->idPassport;
            }
            
            public function setIdPassport($idPassport){
                $this->idPassport=$idPassport;
            }
            public function getFullNamePassport(){
                return $this->fullNamePassport;
            }
            
            public function setFullNamePassport($fullNamePassport){
                $this->fullNamePassport=$fullNamePassport;
            }
            public function getNumPassport(){
                return $this->numPassport;
            }
            
            public function setNumPassport($numPassport){
                $this->numPassport=$numPassport;
            }
            public function getDateExpPassport(){
                return $this->dateExpPassport;
            }
            
            public function setDateExpPassport($dateExpPassport){
                $this->dateExpPassport=$dateExpPassport;
            }
            public function getCodeUser(){
                return $this->codeUser;
            }
            
            public function setCodeUser($codeUser){
                $this->codeUser=$codeUser;
            }
            
        }
        
        