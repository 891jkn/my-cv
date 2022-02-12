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
    "is_res_info"=>"boolean"

]);
$db->CreateTable("Images",[
    "id"=>"int primary key auto_increment",
    "image_path"=>"varchar(255) not null",
    "relation_id"=>"int not null",
]);
$db->CreateTable("Languages",[
    "id"=>"int primary key auto_increment",
    "name"=>"varchar(255) not null",
]);
$db->CreateTable("Projects",[
    "id"=>"int primary key auto_increment",
    "name"=>"varchar(255) not null",
    "link"=>"varchar(255) not null",
    "user_id"=>"int not null REFERENCES users(user_id)"
]);
$db->CreateTable("Attachments",[
    "id"=>"int primary key auto_increment",
    "name"=>"varchar(255) not null",
    "user_id"=>"int not null REFERENCES users(user_id)"
]);
$db->CreateTable("Skills",[
    "id"=>"int primary key auto_increment",
    "language_id"=>"int not null REFERENCES Languages(language_id)",
    "progress"=>"int not null",
    "user_id"=>"int not null REFERENCES users(user_id)"
]);
$db->CreateTable("Skills",[
    "id"=>"int primary key auto_increment",
    "email_from"=>"varchar(255) not null",
    "content"=>"varchar(32765) not null",
    "name"=>"varchar(255)",
    "user_id"=>"int not null REFERENCES users(user_id)"
]);
$db->InsertAutoID("languages",["python"]);
$db->InsertAutoID("languages",["php"]);
$db->InsertAutoID("languages",["html5"]);
$db->InsertAutoID("languages",["css3"]);
$db->InsertAutoID("languages",["javascript"]);
$db->InsertAutoID("languages",["c sharp"]);
$db->InsertAutoID("languages",["c++"]);
$db->InsertAutoID("languages",["jquery"]);
$db->InsertAutoID("languages",["reactJs"]);
$db->InsertAutoID("languages",["angularJs"]);
$db->InsertAutoID("languages",["photoshop"]);
$db->InsertAutoID("languages",["UI"]);
$db->InsertAutoID("languages",["UX"]);
$db->InsertAutoID("languages",["Design"]);
?>