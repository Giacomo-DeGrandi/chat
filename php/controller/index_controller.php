<?php


require_once('php/model/Model.php');
require_once('php/model/User.php');


if(isset($_POST['logout'])){
    $user = new User();
    $user->userDisconnect($_COOKIE['id']);
    setcookie('chan', 0, time() - 3600000 * 240);
    setcookie('id', 0, time() - 3600000 * 240);
    setcookie('connected',0, time() - 3600000 * 240);
    session_destroy();
    header('location: index.php');
}