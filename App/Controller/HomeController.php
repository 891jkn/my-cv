<?php
class HomeController extends BaseController{
   
    public function Index($id = null){
        $model = $this->Model("User");
        return $this->View();
    }
    public function GetUser(){
        return $this->View();
    }
}
?>