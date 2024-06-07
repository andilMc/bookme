<?php 
        namespace src\models;
        class User 
        {
            
        //======================== Variable =======================//
        
        private $idUser;
           private $fullName;
           private $phoneNumber;
           private $email;
           private $birthDate;
           private $password;
           private $verified;
           private $codeUser;
           private $imgProfile;
           private $birthCountry;
           private $address;
           private $admin;
           private $hotelMnger;
           private $carRentalAgent;
           
        //======================== Constructor =======================//
        function __construct($idUser = null,$fullName = null,$phoneNumber = null,$email = null,$birthDate = null,$password = null,$verified = null,$codeUser = null,$imgProfile = null,$birthCountry = null,$address = null,$admin = null,$hotelMnger = null,$carRentalAgent = null) {
            $this->idUser = $idUser;
                $this->fullName = $fullName;
                $this->phoneNumber = $phoneNumber;
                $this->email = $email;
                $this->birthDate = $birthDate;
                $this->password = $password;
                $this->verified = $verified;
                $this->codeUser = $codeUser;
                $this->imgProfile = $imgProfile;
                $this->birthCountry = $birthCountry;
                $this->address = $address;
                $this->admin = $admin;
                $this->hotelMnger = $hotelMnger;
                $this->carRentalAgent = $carRentalAgent;
                }
        
        //======================== Methods =======================//
        
        public function getIdUser(){
                return $this->idUser;
            }
            
            public function setIdUser($idUser){
                $this->idUser=$idUser;
            }
            public function getFullName(){
                return $this->fullName;
            }
            
            public function setFullName($fullName){
                $this->fullName=$fullName;
            }
            public function getPhoneNumber(){
                return $this->phoneNumber;
            }
            
            public function setPhoneNumber($phoneNumber){
                $this->phoneNumber=$phoneNumber;
            }
            public function getEmail(){
                return $this->email;
            }
            
            public function setEmail($email){
                $this->email=$email;
            }
            public function getBirthDate(){
                return $this->birthDate;
            }
            
            public function setBirthDate($birthDate){
                $this->birthDate=$birthDate;
            }
            public function getPassword(){
                return $this->password;
            }
            
            public function setPassword($password){
                $this->password=$password;
            }
            public function getVerified(){
                return $this->verified;
            }
            
            public function setVerified($verified){
                $this->verified=$verified;
            }
            public function getCodeUser(){
                return $this->codeUser;
            }
            
            public function setCodeUser($codeUser){
                $this->codeUser=$codeUser;
            }
            public function getImgProfile(){
                return $this->imgProfile;
            }
            
            public function setImgProfile($imgProfile){
                $this->imgProfile=$imgProfile;
            }
            public function getBirthCountry(){
                return $this->birthCountry;
            }
            
            public function setBirthCountry($birthCountry){
                $this->birthCountry=$birthCountry;
            }
            public function getAddress(){
                return $this->address;
            }
            
            public function setAddress($address){
                $this->address=$address;
            }
            public function getAdmin(){
                return $this->admin;
            }
            
            public function setAdmin($admin){
                $this->admin=$admin;
            }
            public function getHotelMnger(){
                return $this->hotelMnger;
            }
            
            public function setHotelMnger($hotelMnger){
                $this->hotelMnger=$hotelMnger;
            }
            public function getCarRentalAgent(){
                return $this->carRentalAgent;
            }
            
            public function setCarRentalAgent($carRentalAgent){
                $this->carRentalAgent=$carRentalAgent;
            }
            
        }
        
        