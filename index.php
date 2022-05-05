<?php

$header = '';
$footer = '';


ob_start();
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"
            integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY="
            crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">

    <title><?php $title ?></title>

<?php
$head = ob_get_clean();


ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center">
            <div class="display-1">
                MXG
            </div>
        </div>

        <div class="d-flex flex-row align-items-start justify-content-center p-2">

            <div class="col">

                <div class="h1 fw-bold">
                    <b>Chatting made easy</b>
                </div>
                <p class="lead">
                    Chat with users of our communities<br><br>
                    Participate to Talks by arguments!<br>
                    Messages are encrypted end-to-end to<br>
                    preserve your privacy and the one<br>
                    of the people you love!<br>
                </p>

            </div>

            <div class="col bg-white w-50">

            </div>

        </div>

        <div class="d-flex align-items-center justify-content-center">
            <div class="text-center p-3">
                <p>Log In to start messaging</p><br>
                <a class="shadow p-2 rounded-pill bg-light link-dark" href="php/view/connexion.php">log in</a>
            </div>

            <div class="text-center p-3">
                <p>You haven't subscribe yet?</p><br>
                <a class="big shadow p-2 rounded-pill bg-light link-dark" href="php/view/inscription.php">subscribe</a>
            </div>
        </div>


    </div>

<?php

$main = ob_get_clean();





require_once('php/view/main.php');

