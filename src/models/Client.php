<?php 
        namespace src\models;
        class Client 
        {
            
        //======================== Variable =======================//
        
        private $codeClient;
           
        //======================== Constructor =======================//
        function __construct($codeClient = null) {
            $this->codeClient = $codeClient;
                }
        
        //======================== Methods =======================//
        
        public function getCodeClient(){
                return $this->codeClient;
            }
            
            public function setCodeClient($codeClient){
                $this->codeClient=$codeClient;
            }
            
        }
        
        