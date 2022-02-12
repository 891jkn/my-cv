<?php
class ViewHelper{
    public function GenderView($view_path){
        if(file_exists($view_path)){
            require_once $view_path;
        }
    }
}
?>