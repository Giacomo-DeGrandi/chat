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
            $allRights = $user->getAllRights();
            $rights = [];
            for($j=0;$j<=isset($allRights[$j]);$j++){
                for($m=0;$m<=isset($allRights[$j][$m]);$m++){
                    $rights[] = $allRights[$j][$m];
                }
            }
            $rights = array_unique($rights);
            include_once('../view/user_mod.php');
        break;
        case isset($_COOKIE['messagesModify']):
            $selectedMessage = $messages->getMessageById($_COOKIE['messagesModify']);
            $userName = $user->getUserNameById($selectedMessage[0]['sent_by']);
            $channelMess = $channels->getChannelById($selectedMessage[0]['id_channel']);
            $allChannels = $channels->getAllChannelsNames();
            $allChanId = $channels->getAllChannelsId();
            $aChan = [];
            $idChan = [];
            for($j=0;$j<=isset($allChannels[$j]);$j++){
                foreach($allChannels[$j] as $k => $v){
                    if($k === 'name'){
                        $aChan[] = $v;
                    }
                }
                foreach($allChanId[$j] as $k => $v){
                    if($k === 'id'){
                        $idChan[] = $v;
                    }
                }

            }

            $allChan = array_unique($aChan);

            include_once('../view/message_mod.php');
        break;

    endswitch;

}



if(isset($_POST)){

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

                    header('location: ../view/modify.php');

                }
            }
        break;

        case isset($_POST['modifyUser']):

            if(isset($_POST['updUserName']) && isset($_POST['updUserEmail']) &&
                isset($_POST['updUserData']) && isset($_POST['updUserRights']) &&
                isset($_POST['connected'])){

                if( trim($_POST['updUserName'])!==''||
                    trim($_POST['updUserEmail'])!==''||
                    $_POST['updUserData'] !=='' ||
                    $_POST['connected'] !=='' ||
                    $_POST['updUserRights'] !=='' ){

                    $name = $_POST['updUserName'];
                    $email = $_POST['updUserEmail'];
                    $data = $_POST['updUserData'];
                    $rights = intval($_POST['updUserRights']);
                    $id = intval($_POST['modifyUser']);
                    $connected = intval($_POST['connected']);

                    $selectedUser = $user->modifyUser($id,$name,$email,$data,$rights,$connected);

                    header('location: ../view/modify.php');

                }
            }
            break;


        case isset($_POST['modifyMessage']):

            if(isset($_POST['updMessCont']) && isset($_POST['updMessChannel'])){

                if( $_POST['updMessCont']!==''){

                    $content = $_POST['updMessCont'];
                    $id_channel = intval($_POST['updMessChannel']);
                    $id = intval($_POST['modifyMessage']);

                    $selectedUser = $messages->modifyMessages($id,$content,$id_channel);

                    header('location: ../view/modify.php');

                }
            }

            include_once('../view/message_mod.php');
        break;

    endswitch;

}
