<?php 
        namespace src\models;
        class Image 
        {
            
        //======================== Variable =======================//
        
        private $id;
           private $pathImg;
           private $codeOwner;
           
        //======================== Constructor =======================//
        function __construct($id = null,$pathImg = null,$codeOwner = null) {
            $this->id = $id;
                $this->pathImg = $pathImg;
                $this->codeOwner = $codeOwner;
                }
        
        //======================== Methods =======================//
        
        public function getId(){
                return $this->id;
            }
            
            public function setId($id){
                $this->id=$id;
            }
            public function getPathImg(){
                return $this->pathImg;
            }
            
            public function setPathImg($pathImg){
                $this->pathImg=$pathImg;
            }
            public function getCodeOwner(){
                return $this->codeOwner;
            }
            
            public function setCodeOwner($codeOwner){
                $this->codeOwner=$codeOwner;
            }
            
        }
        
        