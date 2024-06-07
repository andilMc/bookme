<?php 
        namespace src\models;
        class Admin 
        {
            
        //======================== Variable =======================//
        
        private $codeAdmin;
           private $role;
           
        //======================== Constructor =======================//
        function __construct($codeAdmin = null,$role = null) {
            $this->codeAdmin = $codeAdmin;
                $this->role = $role;
                }
        
        //======================== Methods =======================//
        
        public function getCodeAdmin(){
                return $this->codeAdmin;
            }
            
            public function setCodeAdmin($codeAdmin){
                $this->codeAdmin=$codeAdmin;
            }
            public function getRole(){
                return $this->role;
            }
            
            public function setRole($role){
                $this->role=$role;
            }
            
        }
        
        