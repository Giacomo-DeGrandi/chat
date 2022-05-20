<?php

session_start();


$title = 'Chat';

if(!isset($_SESSION['id'])){
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

        <div class="d-flex flex-column align-items-center justify-content-center p-1 flex-column w-100 overflow-hidden">
            <div class="h2 w-75 rounded-pill">
                <h1 class="text-fat text-main1 ms-2 p-1" id="chatName"><?= $chatname ?></h1>
            </div>

            <div class="h6 bg-white" id="activeList">
                <h3 class="shadow-sm p-1 text-fat text-cherry">Active users</h3>

                <div class="flex-wrap float-start">
                    <h6 class=" text-fat text-cherry p-1 shadow-sm">
                        <?php for($j=0;$j<=isset($activeUsers[$j]);$j++){ ?>
                            <?= $activeUsers[$j][0] ?>
                        <?php }  ?>
                    </h6>
                </div>

            </div>

            <div class="h6 w-75">
                <p class="text-cherry h4"><?= $chatDescription?></p>
            </div>

            <div class="w-75 h-75 overflow-auto">

                <div class="rounded-0 p-5 w-100 shadow-sm overflow-auto" id="messages">

                    <?php if(!empty($messagesPrinted)){  ?>
                    <?php for($i=0;$i<=isset($messagesPrinted[$i]); $i++){  ?>
                    <?php if($messagesPrinted[$i]['sent_by']===$_SESSION['id']){ ?>

                        <div class="text-end float-end border border-0 bg-light w-75 rounded-left p-2 shadow mb-3 mx-2">
                            <h4 class="text-fat p-2 ms-4"><?= $messagesPrinted[$i]['name'] ?> </h4>

                        <?php } else { ?>

                        <div class="text-start float-start border border-0 bg-light w-75 rounded-right p-2 shadow mb-3 mx-2">
                            <h4 class="text-fat p-2 me-4"><?= $messagesPrinted[$i]['name'] ?> </h4>

                            <?php } ?>

                            <p class="p-1"> <?=  $messagesPrinted[$i]['content'] ?></p>
                            <p class="text-muted small"> <?= $messagesPrinted[$i]['date'] ?> </p>
                        </div>

                        <?php } ?>
                        <?php } ?>

                    </div>

                </div>

                <div class="d-flex flex-row w-75 py-2" id="messBoard">
                    <div class="input-group mb-3">
                        <input class="small form-control border border-1 shadow rounded-pill bg-light" name="messageContent" id="messageContent" placeholder=" Message">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text rounded-pill btn display-2 bg-white shadow p-2" name="sendMessage"  value="<?= $val[0] ?>,<?= $val[1] ?>" id="sendMessage">
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

require_once('footer.php');

require_once('main.php');



