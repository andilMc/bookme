<?php 
        namespace src\models;
        class Review 
        {
            
        //======================== Variable =======================//
        
        private $idReview;
           private $comment;
           private $date;
           private $idUser;
           private $idService;
           
        //======================== Constructor =======================//
        function __construct($idReview = null,$comment = null,$date = null,$idUser = null,$idService = null) {
            $this->idReview = $idReview;
                $this->comment = $comment;
                $this->date = $date;
                $this->idUser = $idUser;
                $this->idService = $idService;
                }
        
        //======================== Methods =======================//
        
        public function getIdReview(){
                return $this->idReview;
            }
            
            public function setIdReview($idReview){
                $this->idReview=$idReview;
            }
            public function getComment(){
                return $this->comment;
            }
            
            public function setComment($comment){
                $this->comment=$comment;
            }
            public function getDate(){
                return $this->date;
            }
            
            public function setDate($date){
                $this->date=$date;
            }
            public function getIdUser(){
                return $this->idUser;
            }
            
            public function setIdUser($idUser){
                $this->idUser=$idUser;
            }
            public function getIdService(){
                return $this->idService;
            }
            
            public function setIdService($idService){
                $this->idService=$idService;
            }
            
        }
        
        