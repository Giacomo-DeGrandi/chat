<?php


require_once('../model/Model.php');
require_once('../model/User.php');



if(isset($_POST['logout'])){
    $user = new User();
    $user->userDisconnect($_COOKIE['id']);
    setcookie('connected', 0, time() - 3600000 * 240);
    setcookie('chan',  0, time() - 3600000 * 240);
    setcookie("id", 0, time() - 3600000 * 240);
    session_destroy();
    header('location: ../../index.php');
}