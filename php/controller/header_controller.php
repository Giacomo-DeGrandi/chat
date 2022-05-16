<?php


require_once('../model/Model.php');
require_once('../model/User.php');



if(isset($_POST['logout'])){
    $user = new User();
    $user->userDisconnect($_COOKIE['id']);
    setcookie('connected', 0, time() - 3600 * 24, "/");
    setcookie('chan',  0, time() - 3600 * 24, "/");
    setcookie("id", 0, time() - 3600 * 24, "/");
    session_destroy();
    header('location: ../../index.php');
}