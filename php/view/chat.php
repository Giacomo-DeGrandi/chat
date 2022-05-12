<?php

session_start();


$title = 'Chat';

$footer = '';

if(!isset($_SESSION['connected'])){
    header('location: ../../index.php');
}



require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');

ob_start();
?>
    <script type="text/javascript" src="../../public/js/chat.js"></script>
<?php
$script = ob_get_clean();



ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center p-5 bg-gold-white flex-column">
            <div class="display-1">
                <p>Chat name</p>
            </div>
            <div class="d-flex align-items-center justify-content-center" id="messages">
                
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <textarea name="messageContent"></textarea>
                <button type="submit" name="messageContent">send<button>
            </div>
            <div class="d-flex align-items-center justify-content-center"></div>
        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('header.php');

require_once('main.php');




