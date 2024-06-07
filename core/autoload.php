<?php 

function autoloader($class) {
    $load = "";
    if(strpos($class,"app")>=0){
        $load = str_replace("app", "public", $class);
        $class = $load;
    }
    $root_dir =dirname(__DIR__,1);

    $file = $root_dir."/".str_replace("\\","/",$class). '.php';
     
  if (file_exists($file)) {
    require_once $file;
  }
}

spl_autoload_register('autoloader');
