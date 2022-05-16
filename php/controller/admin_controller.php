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
$allRights = $users->getAllRights();
$rights = [];
for($j=0;$j<=isset($allRights[$j]);$j++){
    for($m=0;$m<=isset($allRights[$j][$m]);$m++){
        $rights[] = $allRights[$j][$m];
    }
}
$rights = array_unique($rights);

if(isset($_POST)){
    switch($_POST):

        case isset($_POST['addChannel']):
            $name = trim($_POST['channelName']);
            $desc = trim($_POST['channelDesc']);
            if($name !== '' && $desc !== ''){
                $now = date("Y-m-d H:i:s");
                $channels->addNewChannel($name,$desc,$now);
                header('location: ../view/admin.php');
            }
        break;

        case isset($_POST['chanDelete']):
            $id = $_POST['chanDelete'];
            $channels->deleteChannel($id);
            $messages->DeleteAllChannelMessages($id);
            header('location: ../view/admin.php');
            break;

        case isset($_POST['chanModify']):
            $id= $_POST['chanModify'];

            //unset other cookies not to make them interfere with views management
            //set if it doesn't exists
            setcookie("usersModify", 0, time() +3600 * 24, "/");
            setcookie("usersModify", 0, time() - 3600 * 24, "/");
            setcookie("messagesModify", 0, time() + 3600 * 24, "/");
            setcookie("messagesModify", 0, time() - 3600 * 24, "/");

            //set cookie for modify view
            setcookie("chanModify", $_POST['chanModify'], time()+7200);  /* expire in 2 hour */
            header('location: ../view/modify.php');
        break;

        case isset($_POST['usersDelete']):
            $id = $_POST['usersDelete'];
            $messages->deleteAllUsersMessagesByUserId($id);
            $users->deleteUser($id);
            header('location: ../view/admin.php');
        break;

        case isset($_POST['usersModify']):
            $id= $_POST['usersModify'];

            //unset other cookies not to make them interfere with views management
            // set unset
            setcookie("chanModify", 0, time() + 3600 * 24, "/");
            setcookie("chanModify", 0, time() - 3600 * 24, "/");
            setcookie("messagesModify", 0, time() + 3600 * 24, "/");
            setcookie("messagesModify", 0, time() - 3600 * 24, "/");

            //set cookie for modify view
            setcookie('usersModify', $_POST['usersModify'], time()+7200);  /* expire in 2 hour */

            header('location: ../view/modify.php');
        break;

        case isset($_POST['messagesDelete']):
            $id = $_POST['messagesDelete'];
            $messages->deleteMessage($id);
            header('location: ../view/admin.php');
        break;

        case isset($_POST['messagesModify']):
            $id= $_POST['messagesModify'];

            //unset other cookies not to make them interfere with views management
            setcookie("chanModify", 0, time() + 3600 * 24, "/");
            setcookie("chanModify", 0, time() - 3600 * 24, "/");
            setcookie("usersModify",  0, time() + 3600 * 24, "/");
            setcookie("usersModify",  0, time() - 3600 * 24, "/");

            //set cookie for modify view
            setcookie('messagesModify', $_POST['messagesModify'], time()+7200);  /* expire in 2 hour */

            header('location: ../view/modify.php');
        break;

    endswitch;
}