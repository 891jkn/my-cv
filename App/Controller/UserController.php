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
            if(isset($_COOKIE["mycv_user_id"])){
                setcookie("mycv_user_id",time() - 3600);
                setcookie("mycv_user_id",$isUser["id"],time() + (84000*30),"/");
            }else{
                setcookie("mycv_user_id",$isUser["id"],time() + (84000*30),"/");
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