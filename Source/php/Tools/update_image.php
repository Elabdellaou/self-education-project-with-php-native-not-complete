<?php
if(isset($_POST['upd_img'])){
    session_start();
    include '../classes/autoload.php';
    $u = new user($_SESSION['user']['id'], $_SESSION['user']['name'], $_SESSION['user']['email'], $_SESSION['user']['password'], $_SESSION['user']['country'], $_SESSION['user']['xp'], $_SESSION['user']['level'], $_SESSION['user']['Image']);
    $u->setImage($_FILES['img']['name']);
    if($u->UpdateUser()){
        move_uploaded_file($_FILES['img']['tmp_name'], "C:\\xampp\htdocs\Self Education\Images\users\\" . $_FILES['img']['name']);
        $_SESSION['user']['Image']=$_FILES['img']['name'];
    }
    header("Location:../../../Tools/home.php?settings=true");
}