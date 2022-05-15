<?php

session_start();


$title = 'Admin';

$footer = '';

ob_start();
?>
    <script type="text/javascript" src="../../public/js/admin.js"></script>
<?php
$script = ob_get_clean();

require_once('../model/Model.php');
require_once('../model/User.php');
require_once('../controller/admin_controller.php');



ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry">Admin dashboard</h3>


            <!--  channels table & form -->
            <div class="d-flex p-1 rounded-2 shadow-sm">
                <form method="post" class="p-1">
                    <p class="h6 p-1">Add a channel here </p>
                    <label for="channelName">Name</label>
                    <input type="text" name="channelName">
                    <label for="channelDesc">Description</label>
                    <input type="text" name="channelDesc">
                    <button type="submit" class="btn-outline-cherry rounded-pill bg-white">add</button>
                </form>
            </div>

            <div class="vh-50 overflow-auto p-2 shadow-sm rounded-2">
                <h5 class="text-fat text-black">Channels</h5>
                <table class="table w-75 overflow-scroll">
                    <?php   if(isset($allChannels)){ ?>

                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date of creation</th>
                        </tr>

                        <?php   for($i=0;$i<=isset($allChannels[$i]);$i++){  ?>
                            <tr>
                                <td>
                                    <form method="post" class="d-flex flex-column justify-content-center text-cherry text-start shadow-sm">
                                        <button type="submit" class="border border-0 h5 bg-light text-start" value="<?= $allChannels[$i]['id'] ?>" name="chan">
                                            <?= $allChannels[$i]['id'] ?><br>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allChannels[$i]['name'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allChannels[$i]['description'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allChannels[$i]['date_of_creation'] ?></b>
                                </td>

                            </tr>

                        <?php   }  ?>

                    <?php   } else {    ?>

                        <tr>
                            <td>No channels have been created yet </td>
                        </tr>

                    <?php  }  ?>

                </table>
            </div>


            <!--  users table & form  -->

            <div class="d-flex p-1 rounded-2 shadow-sm">
                <form method="post" class="p-1">
                    <p class="h6 p-1">Add a channel here </p>
                    <label for="channelName">Name</label>
                    <input type="text" name="channelName">
                    <label for="channelDesc">Description</label>
                    <input type="text" name="channelDesc">
                    <button type="submit" class="btn-outline-cherry rounded-pill bg-white">add</button>
                </form>
            </div>

            <div class="vh-50 overflow-auto p-2 shadow-sm rounded-2">
                <h5 class="text-fat text-black">Users</h5>
                <table class="table w-75 overflow-scroll">
                    <?php   if(isset($allUsers)){ ?>

                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rights</th>
                            <th>Connected</th>
                        </tr>

                        <?php   for($i=0;$i<=isset($allUsers[$i]);$i++){  ?>
                            <tr>

                                <td>
                                    <form method="post" class="text-cherry text-start shadow-sm">
                                        <button type="submit" class="border border-0 h5 bg-light text-start" value="<?= $allUsers[$i]['id'] ?>" name="chan">
                                            <?= $allUsers[$i]['id'] ?><br>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allUsers[$i]['name'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allUsers[$i]['email'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allUsers[$i]['rights'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allUsers[$i]['connected'] ?></b>
                                </td>

                            </tr>

                        <?php   }  ?>

                    <?php   } else {    ?>
                        <tr>
                            <td> No users have subscribed yet </td>
                        </tr>

                    <?php  }  ?>
                </table>
            </div>

            <!--  messages table  -->

            <div class="vh-50 overflow-auto p-2 shadow-sm rounded-2">
                <h5 class="text-fat text-black">Messages</h5>
                <table class="table w-75 overflow-scroll">

                    <?php   if(isset($allMessages)){ ?>

                        <tr>
                            <th>Id</th>
                            <th>Sent By</th>
                            <th>Date</th>
                            <th>Content</th>
                            <th>On Channel</th>
                        </tr>

                        <?php   for($i=0;$i<=isset($allMessages[$i]);$i++){  ?>
                            <tr>

                                <td>
                                    <form method="post" class="text-cherry text-start shadow-sm">
                                        <button type="submit" class="border border-0 h5 bg-light text-start" value="<?= $allUsers[$i]['id'] ?>" name="chan">
                                            <?= $allMessages[$i]['id'] ?><br>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allMessages[$i]['sent_by'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allMessages[$i]['date'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allMessages[$i]['content'] ?></b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allMessages[$i]['id_channel'] ?></b>
                                </td>

                            </tr>

                        <?php   }  ?>

                    <?php   } else {    ?>
                        <tr>
                            <td> No messages have been sent yet </td>
                        </tr>

                    <?php  }  ?>
                </table>
            </div>

        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('../controller/header_controller.php');

require_once('header.php');

require_once('main.php');




