<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['login']) || $_SESSION['login'] == false)
    header("Location:Login.php");
else {
    include '../Source/php/classes/autoload.php';
    $pass = openssl_decrypt($_SESSION['user']['password'], 'AES-256-CBC', $key, 0, $iv);
    $u = new user($_SESSION['user']['id'], $_SESSION['user']['fullname'], $_SESSION['user']['email'], $pass, $_SESSION['user']['country'], $_SESSION['user']['xp'], $_SESSION['user']['level'], $_SESSION['user']['Image']);
}
