<?php

namespace core;

use core\template\page404;
use ReflectionClass;
use ReflectionFunction;

class Builder
{
    public function __construct()
    {
        $this->run();
    }
    function parse_url()
    {
        if (isset($_GET["url"])) {
            return filter_var($_GET["url"], FILTER_SANITIZE_URL);
        }
    }
    public  function run()
    {
        define("_ROOT_DIR_", dirname(__DIR__, 1));
        define("_public_dir", dirname($_SERVER['SCRIPT_NAME']));
        $bs = trim(((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
        . '://' . $_SERVER['HTTP_HOST']
        . _public_dir), "/");

        if (strpos($bs, "\\") !== false) {
            $bs = str_replace("\\", "", $bs );
        }
        define(
            "base_url",
            $bs
        );

        require_once(__DIR__ . "/../config/const.php");
        require_once(__DIR__ . "/../config/routes.php");
        require_once(__DIR__ . "/../config/vars.php");

        $url =  $this->parse_url();

        if ($url == null) {

            $url = "/";
        } else {
            $url = "/" . $url;
            if (strlen($url) > 1 && $url[strlen($url) - 1] == "/") {
                $base = base_url;
                $url = substr($url, 0, strlen($url) - 1);
                if ($base[strlen($base) - 1] == "\\") {
                    $base = substr($base, 0, strlen($base) - 1);
                }

                header("Location: " . $base . $url);
            }
        }

        foreach ($routes as $key => $value) {

            if (preg_match("#^$key$#", $url, $matches)) {
                $runner = $value;
                list($controller, $method) = explode("@", $runner);
                require_once(__DIR__ . "/../src/controllers/" . $controller . ".php");
                $params = array_slice($matches, 1);

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    foreach ($_POST as $key => $value) {
                        if( $key!="url" ){
                            array_push($params, $value);
                        }
                    }

                    if (isset($_FILES) && !empty($_FILES)) {
                        foreach ($_FILES as $key => $value) {
                            if( $key!="url" ){
                                array_push($params, $value);
                            }
                        }
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    foreach ($_GET as $key => $value) {
                        if( $key!="url" ){
                            array_push($params, $value);
                        }
                    }

                    if (isset($_FILES) && !empty($_FILES)) {
                        foreach ($_FILES as $key => $value) {
                            if( $key!="url" ){
                                array_push($params, $value);
                            }
                        }
                    }
                }

                
                $controller = "src\\controllers\\" . $controller;
                $reflectionClass = new ReflectionClass($controller);
                $reflectionMethod = $reflectionClass->getMethod($method);
                $comments = $reflectionMethod->getDocComment();
                $comments = str_replace("/","",$comments);
                $comments = str_replace("*","",$comments);
                $comments = str_replace(" ","",$comments);
                $annotations = explode("@",$comments);

                foreach ($annotations as $annot) {
                    $reflectionClass = new ReflectionClass("core\\tools\\AnnotationManager");
                    $reg = "/[A-Za-z09]+\((['\"])?[A-Za-z0-9]+(['\"])?\)/";
                        $bool = preg_match($reg,$annot);
                    if ($bool & $annot!=""){
                        $AnnotClass = 'core\\tools\\AnnotationManager';
                        
                        $pos = strpos($annot,"(");
                        $posDCote = strpos($annot,"\"");
                        $posCote = strpos($annot,"'");
                    
                        $methodeAnnot = substr($annot,0,$pos);

                        $fullLastPart = substr($annot,$pos);
                        $posP1 = strpos($fullLastPart,"(");
                        $posP2 = strpos($fullLastPart,")");
                        $paramString = substr($fullLastPart,($posP1+1),($posP2-1));
                        $paramString = str_replace("'","",$paramString) ;
                        $paramString = str_replace("\"","",$paramString) ;

                        $paramsAnnot = explode(",",$paramString) ;
                        $AnnotClass = new $AnnotClass();
                        call_user_func_array([$AnnotClass, $methodeAnnot], $paramsAnnot);
                
                    }
                }
                $controller = new $controller();
                call_user_func_array([$controller, $method], $params);
                return;
            }
        }

        // Aucune route trouvée pour l'URL actuelle
        if (!isset($routes["404"])) {
            new page404();
        } else {
            $runner = $routes["404"];
            list($controller, $method) = explode("@", $runner);
            require_once(__DIR__ . "/../src/controllers/" . $controller . ".php");
            $controller = "src\\controllers\\" . $controller;
            $controller = new $controller();
            $controller->$method();
        }
    }
}
