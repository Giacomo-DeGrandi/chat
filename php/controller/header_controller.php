<?php


require_once('../model/Model.php');
require_once('../model/User.php');



if(isset($_POST['logout'])){
    $user = new User();
    $user->userDisconnect($_COOKIE['id']);
    session_destroy();
    header('location: ../../index.php');
}