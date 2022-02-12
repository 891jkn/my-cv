<?php
// include config file
$configPath = "./Config.php";
// include array helper
$arrayHelperPath = "../Helper/ArrayHelper.php";
if(file_exists($arrayHelperPath) && file_exists($configPath)){
    require_once $arrayHelperPath;
    require_once $configPath;
}
// create database

class Database{
    

    public $query ='';
    // get database info to config-server.json
    public $DB_;

    public $ConfigInfo;

    function __construct()
    {
        $this->ConfigInfo = $this->Get_Config_Info();
        if($this->Config($this->ConfigInfo)){
            if($this->CreateDatabase($this->ConfigInfo["database"])){
                $database_name = $this->ConfigInfo["database"];
                $sql = " USE $database_name";
                if($this->DB_->query($sql) === TRUE){
                };
            }else{
                echo "\nerror when create database";
            }
        }else{
            echo "\nError when config db";
        }
    }
    public function SetQuery($sql){
        $this->query = $sql;
    }
    public function LoadAllRows(){
        
        if(!empty($this->query)){
            $result = $this->DB_->query($this->query) or die($this->DB_->error);
            return $result->fetch_assoc();
        }else{
            die("Query is null");
        }

    }
    public function GetDB(){
        if($this->DB_){
            return $this->DB_;
        }
    }
    
    function CreateDatabase($database_name){

        if($this->DB_){
            $sql = "CREATE DATABASE IF NOT EXISTS $database_name";
            if($this->DB_->query($sql) === TRUE){
                return true;
            }else{
                echo $this->DB_->error;
            }
        }
    }
    public function Insert($table,$data){
        if(is_array($data)){
            $sql = "INSERT INTO $table VALUES (";
            foreach ($data as $item) {
                $sql.= "'".$item ."'". ",";
            }
            $sql = trim(substr($sql,0,-1));
            $sql.=")";
            echo $sql."\n";
            // if($this->DB_->query($sql)){
            // }else{
            //     echo $this->DB_->error;
            // }
        }
    }
    public function InsertAutoID($table,$data){
        if(is_array($data)){
            $count = 1;
            $sql = "INSERT INTO $table VALUES (default,";
            foreach ($data as $item) {
                $sql.= "'".$item ."'". ",";
            }
            $sql = trim(substr($sql,0,-1));
            $sql.=")";
            echo $sql."\n";
            if($this->DB_->query($sql)){
            }else{
                echo $this->DB_->error;
            }
        }
    }
    public function CreateTable($table_name,$field){
        if(is_array($field)){
            if(ArrayHelper::isAssoc($field)){
                $sql = "CREATE TABLE IF NOT EXISTS $table_name (";
                $havePrimary = false;
                foreach ($field as $item => $item_value) {
                    if(strpos(strtoupper($item_value),"PRIMARY KEY") != false){
                        $havePrimary = true;
                    }
                    $sql.= $item ." " . strtoupper($item_value) . ",";
                }
                $sql = trim(substr($sql,0,-1));
                $sql.=")";
                if($havePrimary){
                    if($this->DB_->query($sql)){
                    }else{
                        echo $this->DB_->error;
                    }
                }else{
                    echo "\nTABLE CAN'T HAVE NOT A PRIMARY KEY";
                }
            }else{
                echo "\nData was not corrected format";
            }
            
        }
    }

    function Get_Config_Info(){
        //get config file
        $config_file_path = trim(str_replace("\\","/",str_replace("App\Core"," ",dirname(__FILE__))))."config-server.json";
        if(file_exists($config_file_path)){
            
            $config_data = json_decode(file_get_contents($config_file_path),true);

            if($config_data != null ){
               $server_name = $config_data["ServerName"];
               $user_name = $config_data["UserName"];
               $password = $config_data["Password"];
               $database = $config_data["Database"];
               return array("server_name"=>$server_name,
               "user_name"=>$user_name,"password"=>$password,
               "database"=>$database);
            }
        }else{
            echo "\nError when get config file";
        }
    }
    function Config($configInfo){

        if(is_array($configInfo)){
            $config = new Config($configInfo['server_name'],$configInfo['user_name'],$configInfo['password']);
            $this->DB_ = $config->GetConn();
            if(!$this->DB_){
                return false;
            }
            if($this->DB_!=null){
                return true;
            }
        }
    }
}
?>