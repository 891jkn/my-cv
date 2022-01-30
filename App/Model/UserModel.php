<?php
class User{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetUserByEmail($email){
        $sql = "SELECT * FROM USERS WHERE email = $email";
        $result = $this->db->DB_->query($sql);
        if($result->num_rows === 1){
            return $result->fetch_assoc();
        }        
    }
    public function CheckLogin($email,$password){
        $user = $this->GetUserByEmail($email);
        if($user !== null){
                print_r($user);
        }
    }
}
?>