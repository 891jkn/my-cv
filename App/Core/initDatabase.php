<?php
include "./Database.php";
$db = new Database();

// create table

$db->CreateTable("Users",[

    "id"=>"int primary key auto_increment",
    "user_name"=>"varchar(255) not null",
    "email"=>"varchar(255) not null",
    "password"=>"varchar(255) not null",
    "address"=>"varchar(255)",

]);

?>