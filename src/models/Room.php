<?php 
        namespace src\models;
        class Room 
        {
            
        //======================== Variable =======================//
        
        private $id_room;
           private $is_aviable;
           private $price;
           private $type;
           private $roomNbr;
           private $codeHotel;
           private $description;
           private $codeRoom;
           private $wifi;
           private $bedSize;
           private $maxPerson;
           private $children;
           private $breakfast;
           
        //======================== Constructor =======================//
        function __construct($id_room = null,$is_aviable = null,$price = null,$type = null,$roomNbr = null,$codeHotel = null,$description = null,$codeRoom = null,$wifi = null,$bedSize = null,$maxPerson = null,$children = null,$breakfast = null) {
            $this->id_room = $id_room;
                $this->is_aviable = $is_aviable;
                $this->price = $price;
                $this->type = $type;
                $this->roomNbr = $roomNbr;
                $this->codeHotel = $codeHotel;
                $this->description = $description;
                $this->codeRoom = $codeRoom;
                $this->wifi = $wifi;
                $this->bedSize = $bedSize;
                $this->maxPerson = $maxPerson;
                $this->children = $children;
                $this->breakfast = $breakfast;
                }
        
        //======================== Methods =======================//
        
        public function getId_room(){
                return $this->id_room;
            }
            
            public function setId_room($id_room){
                $this->id_room=$id_room;
            }
            public function getIs_aviable(){
                return $this->is_aviable;
            }
            
            public function setIs_aviable($is_aviable){
                $this->is_aviable=$is_aviable;
            }
            public function getPrice(){
                return $this->price;
            }
            
            public function setPrice($price){
                $this->price=$price;
            }
            public function getType(){
                return $this->type;
            }
            
            public function setType($type){
                $this->type=$type;
            }
            public function getRoomNbr(){
                return $this->roomNbr;
            }
            
            public function setRoomNbr($roomNbr){
                $this->roomNbr=$roomNbr;
            }
            public function getCodeHotel(){
                return $this->codeHotel;
            }
            
            public function setCodeHotel($codeHotel){
                $this->codeHotel=$codeHotel;
            }
            public function getDescription(){
                return $this->description;
            }
            
            public function setDescription($description){
                $this->description=$description;
            }
            public function getCodeRoom(){
                return $this->codeRoom;
            }
            
            public function setCodeRoom($codeRoom){
                $this->codeRoom=$codeRoom;
            }
            public function getWifi(){
                return $this->wifi;
            }
            
            public function setWifi($wifi){
                $this->wifi=$wifi;
            }
            public function getBedSize(){
                return $this->bedSize;
            }
            
            public function setBedSize($bedSize){
                $this->bedSize=$bedSize;
            }
            public function getMaxPerson(){
                return $this->maxPerson;
            }
            
            public function setMaxPerson($maxPerson){
                $this->maxPerson=$maxPerson;
            }
            public function getChildren(){
                return $this->children;
            }
            
            public function setChildren($children){
                $this->children=$children;
            }
            public function getBreakfast(){
                return $this->breakfast;
            }
            
            public function setBreakfast($breakfast){
                $this->breakfast=$breakfast;
            }
            
        }
        
        