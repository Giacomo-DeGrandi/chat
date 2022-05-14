<?php

require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');

// sec functions _______________________________________________________________________________________________________

// foreach $_POST of any key --->>> pass it through htmlspecialchars

foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars((string)$value, ENT_NOQUOTES | ENT_HTML5 | ENT_SUBSTITUTE,
        'UTF-8', /*double_encode*/false );
}


// filter every $_POST of user input with this controller

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// instance  new user to set in db

$user = new User();
$messages = new Messages();
$channels = new Channels();

// In database my user has a constraint on the email column
// ALTER TABLE utilisateurs ADD CONSTRAINT email UNIQUE (email);

$channelList = $channels->getAllChannels();

if(isset($_POST['chan'])){
    setcookie("chan", $_POST['chan'], time()+7200);  /* expire in 2 hour */
    header('location: ../view/chat.php');
}