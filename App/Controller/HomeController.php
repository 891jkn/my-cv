<?php

class HomeController extends BaseController{
   public $user_id;
   public function __construct()
   {
        if(isset($_COOKIE["mycv_user_id"])){
            $this->user_id = $_COOKIE["mycv_user_id"];
        }
   }
    public function Index($id = null){
        if(isset($_COOKIE["mycv_user_id"])){
            return $this->GetUser();
        }
        return $this->View();
    }
    public function ProcessUser($user_raw){

    }
    public function GetUser(){
        if(isset($_COOKIE["mycv_user_id"])){
            $model = $this->Model("User");
            $user_cv_raw = $model->GetUserCV($_COOKIE["mycv_user_id"]) or null;
            if($user_cv_raw !== null && $user_cv_raw !== false){
            $user_cv_converted = $this->ProcessUser($user_cv_raw);
                return $this->View("GetUser","Home",has_layout:true,data:["layout"=>"HomeLayout","user"=>$user_cv_converted]);
            }

            return $this->View("RegisterUserCV","Home",has_layout:true,data:["layout"=>"RegLayout"]);
        }else{
            return $this->View("Index","Home");
        }
    }
}
?>