<?php

require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');


$messages = new Messages();
$channels = new Channels();
$user = new User();


if(isset($_COOKIE)){

    if (isset($_COOKIE['chan'])) {

        // get active users

        $activeUsers = $user->getAllActiveUserName();

        // Get messages to be displayed

        $messagesPrinted = $messages->getAllMessagesByChannel($_COOKIE['chan']);
        $channelName = $channels->getChannelById($_COOKIE['chan']);
        $chatname = $channelName[0]['name'];
        $chatDescription = $channelName[0]['description'];

        $val = [$_SESSION['id'], $_COOKIE['chan']];

    }
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
            $name = $user->getNameById($sentBy);
            $name = $name[0]['name'];

            if(is_array($write)){
                print_r(json_encode([$name,$date]));
            } else {
                print_r(json_encode('error, contact admin'));
            }

            break;

        case (isset($_POST['all'])):

            $chId = $_POST['all'];
            $chId = $channels->getChannelById($chId);
            $allMsg = $messages->getAllMessagesByChannel($chId[0]['id']);
            print_r(json_encode($allMsg));

            break;

    endswitch;

}