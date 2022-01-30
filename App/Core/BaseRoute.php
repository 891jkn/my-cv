<?php

class BaseRoute{
    
    public $controller;
    public $action;
    public $param = [];
        
    public function __construct($url = null){

            $this->SetDefaultUrl("Home","Index");
            // return array 
            $url_val = $this->GetAllowRoute($url);
                
            if(is_array($url_val) && !empty(!empty($url_val))){
                if(isset($url_val[0]) &&!empty($url_val[0])){
                    $this->controller = $url_val[0];
                    unset($url_val[0]);
                }
                if(isset($url_val[1]) && !empty($url_val[1])){
                    $this->action = $url_val[1];
                    unset($url_val[1]);
                }
                $this->param = $url_val?array_values($url_val):[];
            }
    
    }
    public function SetDefaultUrl($controller,$action,$param = []){
        $this->controller = $controller;
        $this->action = $action;
        $this->param = $param;
    }
    public function GetDefaultUrl(){
        
        return "/".$this->controller."/".$this->action."/";
    }
    public function GetAllowRoute($url){
        //home/index
        if($url){
            return explode("/",filter_var(trim($url,"/")));
        }
        return false;
    }

}

?>