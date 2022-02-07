<?php

class Config{

    private $server_name;
    private $user_name;
    private $password;
    public $conn;
    function __construct($server_name,$user_name,$password)
    {
        $this->server_name = $server_name;
        $this->user_name = $user_name;
        $this->password = $password;
        if(!$this->Connection()){
            echo $this->GetError(100);
            die();
        }else{
        }
    }
    function GetConn(){
        if(!$this->conn->connect_error){
            return $this->conn;
        }else{
            return false;
        }
    }
    function Connection () { 
        $this->conn = new mysqli($this->server_name,$this->user_name,$this->password);
        if($this->conn->connect_error){
            return false;
        }
        return true;
    }
    function GetError($code){
        switch($code){
            case 100:
                // 100 is data base connect failed
                return 'Connect failed';
        }
    }
}
?>    