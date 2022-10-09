<?php
$mode = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? $_COOKIE['dark-mode'] : '';
$header_color = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? 'dark' : 'light';
$mode_dropdown = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? 'dropdown-menu-dark' : '';
//$drop_user = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? 'bg-light' : 'bg-dark';
$footer_bg = (isset($_COOKIE['dark-mode']) && !empty($_COOKIE['dark-mode'])) ? 'dark' : 'light';
$nav_picture=$_SESSION['user']['Image']=='default.png'?"nav-user.png":$_SESSION['user']['Image'];

