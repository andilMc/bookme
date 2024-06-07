<?php 
        namespace src\models;
        class Superadmin 
        {
            
        //======================== Variable =======================//
        
        private $codeSuperAdmin;
           
        //======================== Constructor =======================//
        function __construct($codeSuperAdmin = null) {
            $this->codeSuperAdmin = $codeSuperAdmin;
                }
        
        //======================== Methods =======================//
        
        public function getCodeSuperAdmin(){
                return $this->codeSuperAdmin;
            }
            
            public function setCodeSuperAdmin($codeSuperAdmin){
                $this->codeSuperAdmin=$codeSuperAdmin;
            }
            
        }
        
        