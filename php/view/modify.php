<?php

session_start();


$title = 'Modify';

$footer = '';
$script = '';


require_once('../model/Model.php');
require_once('../model/User.php');
require_once('../controller/modify_controller.php');

ob_start();

if(isset($_COOKIE)){
    var_dump($_COOKIE);
}

switch($chanMod||$messageMod||$userMod):
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

require_once('main.php');


