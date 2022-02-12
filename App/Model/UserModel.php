<?php
class UserCV{

    public function __construct($user_raw)
    {
        $this->user_name = $user_raw["user_name"];
        $this->title = $user_raw["title"];
        $this->slogan = $user_raw["slogan"];
        $this->skills = $user_raw["skills"];
        $this->attachments = $user_raw["attachments"];
        $this->contact = $user_raw["contact"];
        $this->projects = $user_raw["projects"];
    }
}
class Skill{
    public function __construct($language_name,$progress)
    {
        $this->lang = $language_name;
        $this->progress = $progress;
    }
}
class User{
    public $db;
    public $myli;
    public $sql;
    public function __construct()
    {
       $db = new Database();
       $this->myli = $db->GetDB();
        $this->db = $db;
    }
    
    public function GetUserByEmail($email){
        $sql = "SELECT * FROM USERS WHERE email = '$email'";
        $result = $this->myli->query($sql) or  die($this->myli->error);
        if($result->num_rows===1){
            return $result->fetch_assoc();
        }
        return $result;
    }
    public function GetUserCV($user_id){
        if($this->CheckUserHasReg()){
            $this->sql = "
                SELECT * FROM users
                left JOIN projects ON projects.user_id = users.id
                left JOIN skills ON skills.user_id = users.id
                left JOIN images ON images.relation_id = 'USER{$user_id}'
                left JOIN attachments ON attachments.user_id = users.id
                WHERE users.id = $user_id
            ";
            $this->db->SetQuery($this->sql);
            $result = $this->db->LoadAllRows();
            return $result;
        }
        return false;
    }
    public function GetUserByID(){
        $id = isset($_COOKIE["mycv_user_id"]) ? $_COOKIE["mycv_user_id"] :null;
        if($id!==null){
            $sql = "SELECT * FROM USERS WHERE users.id = $id";
            $result = $this->myli->query($sql);
            if($result->num_rows === 1){
                return $result->fetch_assoc();
            }
        } 
        return null;
    }
    public function CheckUserHasReg(){
        $user = $this->GetUserByID();
        if($user!==null){
            if($user["has_reg"] == 1){
                return true;
            }
            return false;
        }

    }
    public function CheckUserHasTaken($email){
        $sql = "SELECT * FROM USERS WHERE email = '$email'";
        $result = $this->myli->query($sql) or  die($this->db->error);
        if($result->num_rows===1){
            return true;
        }
        return false;
    }
    public function CheckLogin($email,$password){
        $user = $this->GetUserByEmail($email);
        if(!empty($user)){
            if(is_array($user)){
                if($user["password_"]==$password){
                    return $user;
                }
            }
        }
        return false;
    }
    public function CreateNewAccount($email,$password){
        $checkHasUser = $this->CheckUserHasTaken($email);
        if($checkHasUser === false){
            $sql = "INSERT INTO users (email,password_,has_reg) VALUES ('$email', '$password',0)";
            if($this->myli->query($sql)===true){
               return true;
            }else{
                return $this->db->error;
            }       
        }else{
            return 'Email Has Been Taken!';
        }
    }
}
?>