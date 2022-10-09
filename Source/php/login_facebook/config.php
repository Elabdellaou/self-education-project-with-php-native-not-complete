<?php

require_once 'vendor/autoload.php';

if (!session_id()) {
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
    'app_id'      => '933412630689352',
    'app_secret'     => '21ae890d1a8272bdd2b952ce6b723eeb',
    'default_graph_version'  => 'v2.10'
]);
