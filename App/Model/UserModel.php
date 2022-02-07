<?php
class User{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetUserByEmail($email){
        $sql = "SELECT * FROM USERS WHERE email = '$email'";
        $result = $this->db->DB_->query($sql) or  die($this->db->DB_->error);
        if($result->num_rows===1){
            return $result->fetch_assoc();
        }
        return $result;
    }
    public function CheckUserHasTaken($email){
        $sql = "SELECT * FROM USERS WHERE email = '$email'";
        $result = $this->db->DB_->query($sql) or  die($this->db->DB_->error);
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
            $sql = "INSERT INTO users (email,password_) VALUES ('$email', '$password')";
            if($this->db->DB_->query($sql)===true){
               return true;
            }else{
                return $this->db->DB_->error;
            }       
        }else{
            return 'Email Has Been Taken!';
        }
    }
}
?>