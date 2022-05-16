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
        case isset($_COOKIE['chanModify']):
            $selectedChan = $channels->getChannelById($_COOKIE['chanModify']);
            include_once('../view/chan_mod.php');
        break;
        case isset($_COOKIE['usersModify']):
            $selectedUser = $user->getUserInfosById($_COOKIE['usersModify']);
            include_once('../view/user_mod.php');
        break;
        case isset($_COOKIE['messagesModify']):
            $selectedMessage = $messages->getMessageById($_COOKIE['usersModify']);
            include_once('../view/message_mod.php');
        break;

    endswitch;

}


if(isset($_POST)){
    var_dump($_POST);

    switch ($_POST):

        case isset($_POST['modifyChannel']):

            if(isset($_POST['updChanName']) && isset($_POST['updChanDesc']) && isset($_POST['date_of_creation'])){

                if( trim($_POST['modifyChannel'])!==''||
                    trim($_POST['date_of_creation'])!==''||
                    trim($_POST['updChanName'])!==''||
                    trim($_POST['updChanDesc'])!==''){
                    $name = $_POST['updChanName'];
                    $doc = $_POST['date_of_creation'];
                    $desc = $_POST['updChanDesc'];
                    $id = $_POST['modifyChannel'];
                    $date = date("Y-m-d H:i:s");


                    $selectedChan = $channels->modifyChannel($id,$name,$desc,$doc,$date);

                    include_once('../view/chan_mod.php');
                }
            }
        break;

        case isset($_COOKIE['usersModify']):
            include_once('../view/user_mod.php');
        break;
        case isset($_COOKIE['messagesModify']):
            include_once('../view/message_mod.php');
        break;

    endswitch;

}
