<?php

session_start();


$title = 'Chat';

$footer = '';

if(!isset($_COOKIE['connected'])){
    header('location: ../../index.php');
}


require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');
require_once('../controller/chat_controller.php');

ob_start();
?>
    <script type="text/javascript" src="../../public/js/chat.js"></script>
<?php
$script = ob_get_clean();



ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-start justify-content-center p-1 bg-white flex-column w-100 overflow-hidden">
            <div class="h2 w-75 bg-gold-white rounded-pill">
                <h1 class="text-fat text-main1 ms-2 p-1" id="chatName"><?= $chatname ?></h1>
            </div>


            <div class="h6 w-75">
                <p><?= $chatDescription?></p>
            </div>

            <div class="d-flex flex-row vh-70 bg-cherry-white w-100">


                <div class="d-flex flex-column rounded-0 overflow-auto p-5 shadow-sm w-75 " id="messages">

                    <?php if(!empty($messagesPrinted)){  ?>
                        <?php for($i=0;$i<=isset($messagesPrinted[$i]); $i++){  ?>
                            <?php if($messagesPrinted[$i]['sent_by']===$_SESSION['id']){ ?>

                                <div class="bg-light shadow-sm mb-1 p-1">
                                    <h3 class="text-fat p-1"><?= $messagesPrinted[$i]['name'] ?> </h3>
                                    <p class="p-1"> <?=  $messagesPrinted[$i]['content'] ?></p>
                                    <p class="text-muted"> <?= $messagesPrinted[$i]['date'] ?> </p>
                                </div>


                            <?php } else { ?>

                                <div class="bg-white shadow-sm mb-1 p-1">
                                    <h3 class="text-fat p-1"><?= $messagesPrinted[$i]['name'] ?> </h3>
                                    <p class="p-1"> <?=  $messagesPrinted[$i]['content'] ?></p>
                                    <p class="text-muted"> <?= $messagesPrinted[$i]['date'] ?> </p>
                                </div>

                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                </div>

                <div class="h6 w-25 bg-white" id="activeList">
                    <h3 class="shadow-sm p-1 text-fat text-cherry">Active users</h3>

                    <div class="flex-wrap">
                        <h3 class=" text-fat text-cherry p-1 shadow-sm">
                        <?php for($j=0;$j<=isset($activeUsers[$j]);$j++){ ?>
                            <?= $activeUsers[$j][0] ?>
                        <?php }  ?>
                        </h3>
                    </div>

                </div>

            </div>

            <div class="d-flex flex-row w-75 py-2" id="messBoard">
                <div class="input-group mb-3">
                    <textarea class="form-control border border-0 bg-light" name="messageContent" id="messageContent" placeholder=" Message"></textarea>
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text btn display-2 bg-cherry shadow-sm p-2" name="sendMessage"  value="<?= $val[0] ?>,<?= $val[1] ?>" id="sendMessage">
                            <img src="../../public/icons/pplane.svg" alt="pplane">
                        </button>
                    </div>
                    <small></small>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center"></div>
        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('../controller/header_controller.php');


require_once('header.php');

require_once('main.php');




