<?php 
        namespace src\models;
        class Subadmin 
        {
            
        //======================== Variable =======================//
        
        private $codeSubAdmin;
           
        //======================== Constructor =======================//
        function __construct($codeSubAdmin = null) {
            $this->codeSubAdmin = $codeSubAdmin;
                }
        
        //======================== Methods =======================//
        
        public function getCodeSubAdmin(){
                return $this->codeSubAdmin;
            }
            
            public function setCodeSubAdmin($codeSubAdmin){
                $this->codeSubAdmin=$codeSubAdmin;
            }
            
        }
        
        