<?php

class UserController extends BaseController{

    protected $model;
    function __construct()
    {
        $this->model = $this->Model('User');    
    }
    public function Login($email = null,$password = null){

        $isUser = $this->model->CheckLogin($email,$password);
        if(!empty($isUser)){
            if(!isset($_COOKIE["user_id"])){
                setcookie("user_id",$isUser["id"],3600*24*30);
            }
            echo "true";
        }else{
            echo "false";
        }
    }
    public function SignIn($email,$password){
        echo json_encode($this->model->CreateNewAccount($email,$password));
    }
}
?>