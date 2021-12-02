<?php

spl_autoload_register("myAutoLoader");

function myAutoLoader($class){
    $path = "classes/";
    $extenstion = ".php";
    $filename = $path . $class . $extenstion;

    if(!file_exists($filename)){
        return false;
    }

    include_once $path. $class . $extenstion;

}

?>