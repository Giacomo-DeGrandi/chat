<?php

session_start();


$title = 'Hall';

$footer = '';

if(!isset($_SESSION['connected'])){
    header('location: ../../index.php');
}


require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');
require_once('../controller/channel_controller.php');

ob_start();
?>
    <script type="text/javascript" src="../../public/js/hall.js"></script>
<?php
$script = ob_get_clean();



ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center p-5 bg-gold-white">
            <div class="display-1">
                <p>Channels</p>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center p-5 bg-gold-white" id="channelList">

            <?php   if(isset($channelList)){  ?>
                <div class="row">
                    <h3> <?= $channelList['name'] ?> </h3>
                    <p> <?=  $channelList['description'] ?> </p>
                </div>
            <?php   }  ?>

        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('header.php');

require_once('main.php');


