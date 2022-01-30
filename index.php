<?php
    $path = str_replace("\\","/",__DIR__."/App/WebStart.php");
    if(file_exists($path)){
        require_once $path;
    }else{
        require_once "./error/401.php";
    }
?>