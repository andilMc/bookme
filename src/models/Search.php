<?php 
        namespace src\models;
        class Search 
        {
            
        //======================== Variable =======================//
        
        private $id;
           private $service;
           private $data;
           
        //======================== Constructor =======================//
        function __construct($id = null,$service = null,$data = null) {
            $this->id = $id;
                $this->service = $service;
                $this->data = $data;
                }
        
        //======================== Methods =======================//
        
        public function getId(){
                return $this->id;
            }
            
            public function setId($id){
                $this->id=$id;
            }
            public function getService(){
                return $this->service;
            }
            
            public function setService($service){
                $this->service=$service;
            }
            public function getData(){
                return $this->data;
            }
            
            public function setData($data){
                $this->data=$data;
            }
            
        }
        
        