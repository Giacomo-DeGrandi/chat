<?php

session_start();


$title = 'Modify';

$script = '';


require_once('../model/Model.php');
require_once('../model/User.php');
require_once('../controller/modify_controller.php');

if(!isset($_SESSION['rights'])||$_SESSION['rights']!=='42'){


    $user = new User();
    $user->userDisconnect($_COOKIE['id']);
    setcookie('connected', 0, time() - 3600000 * 240);
    setcookie('chan',  0, time() - 3600000 * 240);
    setcookie("id", 0, time() - 3600000 * 240);
    session_destroy();
    header('location: ../../index.php');
}


ob_start();


switch(isset($chanMod)||isset($messageMod)||isset($userMod)):
    case (isset($chanMod)):
        echo $chanMod;
    break;
    case (isset($messageMod)):
         echo $messageMod;
    break;
    case (isset($userMod)):
        echo $userMod;
    break;
endswitch;


$main = ob_get_clean();

require_once('../controller/header_controller.php');

require_once('header.php');

require_once('footer.php');

require_once('main.php');


