<?php
include "../classes/autoload.php";
session_start();
function valid($var)
{
    for ($i = 0; $i < strlen($var); $i++) {
        if ($var[$i] == ' ')
            $var[$i] = '+';
    }
    return $var;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $user = new user();
        $user->setEmail($_POST['email_in']);
        $pass = openssl_encrypt($_POST['password_in'], 'AES-256-CBC', $key, 0, $iv);
        $user->setPassword($pass);
        if ($user->ExitUser()){
            if($_POST['remember_me']=="on"){
                setcookie("email",$user->getEmail(),time()+60*60*24*30*12,"");
                $pass=Valid($user->getPassword());
                setcookie("pass", openssl_decrypt($pass, 'AES-256-CBC', $key, 0, $iv),time()+60*60*24*30*12,"");
            }
            header("Location:../../../Tools/home.php");
        }else
            header("Location:../../../Tools/Login.php?err");
    }   
}else 
    header("Location:../../../Tools/Login.php");
