<?php

include "../classes/autoload.php";
if(isset($_POST["id"])&& isset($_POST["password"])){
    $u=new user();
    $u->setId($_POST["id"]);
    $u->searchUser_id();
    $pass = openssl_encrypt($_POST['password'], 'AES-256-CBC', $key, 0, $iv);
    $u->setPassword($pass);
    $u->filter();
    $u->UpdateUser();
    header("Location:http://localhost/Self%20Education/Tools/home.php");
}
