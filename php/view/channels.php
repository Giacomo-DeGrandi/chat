<?php

session_start();


$title = 'Hall';



if(!isset($_COOKIE['connected'])){      // verify it  DAMN !!!!!!!!!!!!
    header('location: ../../index.php');
}


require_once('../model/Model.php');
require_once('../model/Channels.php');
require_once('../model/Messages.php');
require_once('../model/User.php');
require_once('../controller/channel_controller.php');

$script = '';



ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column align-items-start justify-content-center bg-white">
            <h2 class="ms-3 shadow-sm p-2 rounded-pill display-3">Channels</h2>
        </div>

        <div class="d-flex flex-column align-items-center justify-content-center p-3 bg-white" id="channelList">
            <table class="table w-100">
                <?php   if(isset($channelList)&&!empty($channelList)){ ?>
                        <tr class="shadow-sm p-2">
                            <th class="p-2">Channels</th>
                            <th class="p-2">Replies</th>
                            <th class="p-2">Last Activity</th>
                        </tr>
                    <?php   for($i=0;$i<=isset($channelList[$i]);$i++){  ?>
                        <tr>
                            <td>
                                <form method="post" class="d-flex flex-column justify-content-center text-blue text-start shadow-sm">
                                    <button type="submit" class="border border-0 bg-white h4 text-start p-2" value="<?= $channelList[$i]['id'] ?>" name="chan">
                                     <b class="text-fat text-blue"><?= $channelList[$i]['name'] ?></b><br>
                                     <b class="h6 text-black"><?= $channelList[$i]['description'] ?></b>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <b class="h5 text-black"><?= $allReplies[$i] ?></b>
                            </td>

                            <td>
                                <b class="small text-black"><?= $lastActivity[$i] ?></b>
                            </td>

                        </tr>

                    <?php   }  ?>


                <?php   } else {   ?>
                    <tr class="shadow-sm p-2">
                        <th class="p-2">No channels have been created yet</th>
                    </tr>

                <?php   }  ?>
            </table>

        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('../controller/header_controller.php');

require_once('header.php');

require_once('footer.php');

require_once('main.php');


