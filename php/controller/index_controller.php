<?php


require_once('php/model/Model.php');
require_once('php/model/User.php');


if(isset($_POST['logout'])){
    $user = new User();
    $user->userDisconnect($_COOKIE['id']);
    setcookie('chan', null, -1, '/');
    setcookie('id', null, -1, '/');
    session_destroy();
    header('location: index.php');
}