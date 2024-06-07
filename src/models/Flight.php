<?php 
        namespace src\models;
        class Flight 
        {
            
        //======================== Variable =======================//
        
        private $id;
           private $data;
           
        //======================== Constructor =======================//
        function __construct($id = null,$data = null) {
            $this->id = $id;
                $this->data = $data;
                }
        
        //======================== Methods =======================//
        
        public function getId(){
                return $this->id;
            }
            
            public function setId($id){
                $this->id=$id;
            }
            public function getData(){
                return $this->data;
            }
            
            public function setData($data){
                $this->data=$data;
            }
            
        }
        
        