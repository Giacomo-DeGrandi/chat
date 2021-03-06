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



$messages = new Messages();
$channels = new Channels();
$user = new User();


//  I DON T USE COOKIES CAUSE I CAN SET THEM IN JS WHILE SESSION ARE UNSETTABLE CAUSE SERVER-SIDE
// THE CHOICE DERIVE FROM THE FACT THAT MY VALIDATION FROM CONNEXION.PHP IS
// FIRST - VALIDATED IN JS, THEN SENT TO PHP THAN VALIDATED IN PHP AND THEN RESENT TO JS TO
// RELOCATE THE USER... SO THE END PART IS IN JS, if i didn't had any validation on the profil if
// a baduser set the right cookies it could manage to be admin


if(!isset($_SESSION['id'])AND !isset($_POST)) {
    $user->userDisconnect($_SESSION['id']);
    setcookie('connected', 0, time() - 3600000 * 240);
    setcookie('chan', 0, time() - 3600000 * 240);
    setcookie("id", 0, time() - 3600000 * 240);
    session_destroy();
    header('location: ../../index.php');
} elseif(isset($_SESSION['id'])AND !isset($_POST)){

    $userInfo = $user->getUserInfosById($_SESSION['id']);
    $userMessages = $messages->getAllMessagesByUserId($_SESSION['id']);
    $countMessages = $messages->messagesCountByUser($_SESSION['id']);

    // get channel occurrences
    $chanOccur = [];

    if(count($userMessages)>1){

        for($i=0;$i<=isset($userMessages[$i]);$i++){
            foreach ($userMessages[$i] as $k => $v){
                if($k ==='id_channel'){
                    $chanOccur[] = $v;
                }
            }
        }
        $occ = array_count_values($chanOccur);
        $nameArrChanVal = [];
        // link channel names
        foreach($occ as $t => $v){
            $nameArrChanVal[] = $t;
        }
        $nameArrChan =  [];
        foreach($nameArrChanVal as $f => $d){
            $nameArrChan[] = $channels->getChannelIdByid($d);
        }


        function flatten(array $array) {
            $return = array();
            array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
            return $return;
        }

        $flatList = flatten($nameArrChan);
        $nameList = array_unique($flatList);
        $chanNamesWithNumbOfMess = array_combine($nameList,$occ);

    }


}


if($_POST){

    switch($_POST):

        case isset($_POST['emailExistsUpdate']):
        case isset($_POST['emailExistsUpdateId']):

            $email  = $_POST['emailExistsUpdate'];
            $id  = $_POST['emailExistsUpdateId'];
            $check = $user->checkExistsUpdate($email,$id);

            if(!empty($check)){
                print_r(json_encode('exists'));
            } else {
                print_r(json_encode(''));
            }


            break;

        case isset($_POST['submitUpdateUser']) :

        $errors = [];

            $id = $_POST['submitUpdateUser'];
            $username = $_POST['username'];
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pw = $_POST['password'];
            $pwC = $_POST['passwordConf'];

            // check for errors in user inputs and count them
            if (empty($username)) {
                array_push($errors, "Firstname is required");
            }
            if (empty($email)) {
                array_push($errors, "Email is required");
            }
            if (!preg_match('/^[a-z0-9._-]+[@]+[a-zA-Z0-9._-]+[.]+[a-z]{2,3}$/', $email)) {
                array_push($errors, "Email format is wrong");
            }
            if (empty($pw)) {
                array_push($errors, "Password is required");
            }
            if ($pw !== $pwC) {
                array_push($errors, "The two passwords do not match");
            }
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/', $pw)) {
                array_push($errors, "Password format is wrong");
            }

            //check if user exists
            $chkExists = $user->checkExistsUpdate($email,$id);


            if (!empty($chkExists)) { array_push($errors, "This email already exists, please chose another email, or log in as another user");     }
            // Finally, register user if there are no errors in the form
            if (empty($errors)) {

                $user->submitUpdateUser($username, $email, $pw, $id);

                print_r(json_encode('updated'));
            }

            break;
    endswitch;
}
