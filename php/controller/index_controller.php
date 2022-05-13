<?php


require_once('php/model/Model.php');
require_once('php/model/User.php');


if(isset($_POST['logout'])){
    $user = new User();
    $user->userDisconnect($_SESSION['id']);
    session_destroy();
    header('location: index.php');
}