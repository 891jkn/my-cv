<?php
class HomeController extends BaseController{
   
    public function Index($id = null){
        return $this->View();
    }
    public function GetUser(){
        return $this->View();
    }
}
?>