<?php
if (isset($_COOKIE['page_start']))
    header("Location:" . $_COOKIE['page_start']);
else
    include('Login.php');
