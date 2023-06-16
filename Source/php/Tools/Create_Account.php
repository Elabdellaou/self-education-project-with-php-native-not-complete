<?php
include "../classes/autoload.php";
session_start();
$access_encrypt = openssl_encrypt("self", 'AES-256-CBC', $key, 0, $iv);
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    if (isset($_POST['submit'])) {
        $pass = openssl_encrypt($_POST['password'], 'AES-256-CBC', $key, 0, $iv);
        $user_up = new user("",$_POST['fullname'],$_POST['email'],$pass ,"Morocco");
        $user_up->filter();
        if ($user_up->AddUser()){
            header("Location:../../../Tools/home.php");
        }
        // if ($user_up->AddUser()){
        //     header("Location:../mail/Welcome.php?token=".$access_encrypt);
        // }
        // else
        //     header("Location:../../../Tools/Login.php?errup");
    }else
        header("Location:../../../Tools/Login.php");
else:
    header("Location:../../../Tools/Login.php");
endif;
