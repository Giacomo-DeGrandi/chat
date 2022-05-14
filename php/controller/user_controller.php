<?php


session_start();

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

// In database my user has a constraint on the email column
// ALTER TABLE utilisateurs ADD CONSTRAINT email UNIQUE (email);

if($_POST){

    switch($_POST):

        case isset($_POST['emailExistsLog']):

            $email  = $_POST['emailExistsLog'];
            $check = $user->checkExists($email);

            if(!empty($check)){
                print_r(json_encode('exists'));
            } else {
                print_r(json_encode(''));
            }

            exit();
            break;

        case isset($_POST['emailExists']):

            $email  = $_POST['emailExists'];
            $check = $user->checkExists($email);

            if(!empty($check)){
                print_r(json_encode('exists'));
            } else {
                print_r(json_encode(''));
            }

            exit();
            break;

        case isset($_POST['submitSub']):

            $errors = [];

            $username = $_POST['username'];
            $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            $pw = $_POST['password'];
            $pwC = $_POST['passwordConf'];
            $dob = $_POST['date'];

            // check for errors in user inputs and count them
            if(empty($username)){     array_push($errors, "Firstname is required");     }
            if(empty($email)){     array_push($errors, "Email is required");       }
            if (!preg_match('/^[a-z0-9._-]+[@]+[a-zA-Z0-9._-]+[.]+[a-z]{2,3}$/', $email)){    array_push($errors, "Email format is wrong");     }
            if(empty($pw)){     array_push($errors, "Password is required"); }
            if(empty($dob)){    array_push($errors, "Date is required");    }
                if ($pw !== $pwC) {     array_push($errors, "The two passwords do not match");      }
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/', $pw)) {    array_push($errors, "Password format is wrong");    }

            //check if user exists
            $chkExists = $user->checkExists($email);

            if ( !empty($chkExists)) {    array_push($errors, "This user has already subscribed, please log in");     }

            // check if user is at least 18
            $nowDate = getdate();
            $nowDate = strtotime($nowDate[0]);
            $nowDate = new DateTime($nowDate);

            $testDate = new DateTime($dob);


            $difference = $nowDate->diff($testDate);

            if($difference-> y < 18){    array_push($errors, "You have to be at least 18yo to subscribe");   }

             // Finally, register user if there are no errors in the form
            if ( empty($errors) ) {

                $rights = 1;
                $data1 = 'example';
                $connected = 0;

                $user->subscribeUser( $username, $email, $pw, $rights, $dob, $data1, $connected);

                $userInfos = $user->getUserInfosByEmail($email);

                print_r(json_encode('setted'));
            }

            break;

        case isset($_POST['submitLog']) :

                $errors= [];

                // receive all input values from the form
                $password = $_POST['inputPassword'];
                $email = htmlspecialchars($_POST['inputEmail']);

                // form validation:
                // count errors
                if(empty($password)){     array_push($errors, "Password is required"); }
                if(empty($email)){     array_push($errors, "Email is required");       }

                // check the database to make sure
                // a user does exist with the same login and password
                $checkExists = $user->checkExists($email);

                if ( !$checkExists ) {
                    array_push($errors, "This email is not registered, please subscribe to log in");
                }

                if (!password_verify($password, $checkExists[0]['password'])) {
                    array_push($errors, "Wrong password");
                }


                if (empty($errors)) {

                    // apparently cookies doesn't set immediately,
                    // the page is relocate by JS so they basically never set
                    // to address this problem i set them in JS- directly -->(after encrypting them would be better)!
                    //  BUT THE ONES WITH *POSSIBLY* sens D, They'll be SESSION -->(after encrypting them would be better)!!

                    $user->userConnected($email);

                    $_SESSION['id']=$checkExists[0]['id'];
                    $_SESSION['rights']= $checkExists[0]['rights'];

                    print_r(json_encode($_SESSION['id']));

                }


    endswitch;
}

