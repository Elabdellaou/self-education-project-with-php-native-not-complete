<?php

if(isset($_POST['update'])){
    session_start();
    include '../classes/autoload.php';
    $pass= openssl_encrypt($_POST['pass'], 'AES-256-CBC', $key, 0, $iv);
    $u = new user($_SESSION['user']['id'], $_POST['fullname'], $_POST['email'], $pass, $_POST['country'], $_SESSION['user']['xp'], $_SESSION['user']['level'], $_SESSION['user']['Image']);
    if($u->UpdateUser()){
        $_SESSION['user']['fullname']=$_POST['fullname'];
        $_SESSION['user']['password']=$pass;
        $_SESSION['user']['email']=$_POST['email'];
        $_SESSION['user']['country']=$_POST['country'];
    }
    //header("Location:../../../Tools/home.php?settings=true");
}
