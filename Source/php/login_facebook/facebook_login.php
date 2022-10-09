<?php
include('config.php');
$facebook_helper = $facebook->getRedirectLoginHelper();

if (isset($_GET['code'])) {
    if (isset($_SESSION['access_token'])) {
        $access_token = $_SESSION['access_token'];
    } else {
        $access_token = $facebook_helper->getAccessToken();

        $_SESSION['access_token'] = $access_token;

        $facebook->setDefaultAccessToken($_SESSION['access_token']);
    }

    $_SESSION['user_id'] = '';
    $_SESSION['user_name'] = '';
    $_SESSION['user_email_address'] = '';
    $_SESSION['user_image'] = '';

    @$graph_response = $facebook->get("/me?fields=name,email", $access_token) or die("error");
    @$facebook_user_info = $graph_response->getGraphUser() or die("error");

    @$picture = $facebook->get("/me/picture?redirect=false&height=150", $access_token) or die("error");
    $pic = $picture->getGraphUser();
    if (!empty($facebook_user_info['id'])) {
        $_SESSION['user_id'] = $facebook_user_info['id'];
        $_SESSION['user_image'] = $pic['url'];
    }

    if (!empty($facebook_user_info['name'])) {
        $_SESSION['user_name'] = $facebook_user_info['name'];
    }

    if (!empty($facebook_user_info['email'])) {
        $_SESSION['user_email_address'] = $facebook_user_info['email'];
    }
    header("Location:home.php");
} else {
    $facebook_permissions = [""];
    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/Quiz_C/Tools/', $facebook_permissions);
}
