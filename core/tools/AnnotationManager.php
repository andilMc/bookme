<?php 
namespace core\tools;

 class AnnotationManager
{
    public function Methode($methode="GET"){
        if ($_SERVER['REQUEST_METHOD'] == $methode) {
           return true;
        } else {
            header("Location:/404");
        }
    }
}
