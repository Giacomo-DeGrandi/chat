<?php

require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');


$messages = new Messages();
$channels = new Channels();


if(isset($_SESSION['chan'])) {

    $messagesPrinted = $messages->getAllMessagesByChannel($_SESSION['chan']);
    $channels = $channels->getChannelById($_SESSION['chan']);

    $chatname = $channels[0]['name'];
    $chatDescription = $channels[0]['description'];

    $val = [$_SESSION['id'],$_SESSION['chan']];
}

if ($_POST) {

    switch ($_POST):

        case isset($_POST['messageContent']):

        case (isset($_POST['id'])):

        case (isset($_POST['channel'])):

            $sentBy = $_POST['id'];
            $id_channel =  $_POST['channel'];
            $content = $_POST['messageContent'];
            $date = getdate();
            $date = $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
            $write = $messages->write($sentBy, $content, $date, $id_channel);


        if(is_array($write)){
                print_r(json_encode($_SESSION['id']));
            } else {
                print_r(json_encode('error, contact admin'));
            }

            break;

    endswitch;

}