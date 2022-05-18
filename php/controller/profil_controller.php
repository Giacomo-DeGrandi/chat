<?php

require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');






$messages = new Messages();
$channels = new Channels();
$user = new User();

if(!isset($_SESSION['id'])) {
    $user->userDisconnect($_SESSION['id']);
    setcookie('connected', 0, time() - 3600000 * 240);
    setcookie('chan', 0, time() - 3600000 * 240);
    setcookie("id", 0, time() - 3600000 * 240);
    session_destroy();
    header('location: ../../index.php');
}

$userInfo = $user->getUserInfosById($_SESSION['id']);
$userMessages = $messages->getAllMessagesByUserId($_SESSION['id']);

