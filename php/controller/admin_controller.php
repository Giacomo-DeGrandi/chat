<?php


require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');


if(!isset($_SESSION['id'])||!isset($_SESSION['rights'])||$_SESSION['rights'] !== '42'){
    session_destroy();
    header('location: ../../index.php');

}

$channels = new Channels();
$messages = new Messages();
$users = new User();

$allChannels = $channels->getAllChannels();
$allMessages = $messages->getAllMessages();
$allUsers = $users->getAllUsers();

