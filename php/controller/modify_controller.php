<?php


require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');


$messages = new Messages();
$channels = new Channels();
$user = new User();


if(isset($_COOKIE)){

    switch ($_COOKIE):
        case $_COOKIE['usersModify'] === 0:
        case $_COOKIE['messagesModify'] === 0:
            include_once('../view/chan_mod.php');
        break;
        case $_COOKIE['chanModify'] === 0:
        case $_COOKIE['messagesModify'] === 0:
        include_once('../view/user_mod.php');

            break;
        case $_COOKIE['chanModify'] === 0:
        case $_COOKIE['usersModify'] === 0:
            include_once('../view/message_mod.php');

            break;

    endswitch;

}
