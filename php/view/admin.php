<?php

session_start();


$title = 'Admin';


$script = '';


require_once('../model/Model.php');
require_once('../model/User.php');
require_once('../controller/admin_controller.php');


ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry">Admin dashboard</h3>


            <!--  channels table & form -->
            <div class="d-flex p-1 rounded-2 shadow-sm mb-2">
                <form method="post" class="p-1">
                    <p class="h5 p-1">Add a channel here </p>
                    <label for="channelName" class="h5">Name</label>
                    <input type="text" name="channelName" class="rounded-pill border border-1 border-cherry">
                    <label for="channelDesc" class="h5">Description</label>
                    <input type="text" name="channelDesc" class="rounded-pill border border-1 border-cherry">
                    <button type="submit" class="btn-outline-cherry rounded-pill bg-white" name="addChannel">add +</button>
                </form>
            </div>

            <h5 class="text-fat text-black">Channels</h5>
            <div class="vh-50 overflow-auto p-2 shadow-sm rounded-2 mb-2">
                <table class="table w-100 overflow-scroll">
                    <?php   if(isset($allChannels)){ ?>

                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date of creation</th>
                            <th>Delete</th>
                            <th>Modify</th>
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

                                <td>
                                    <form method="post">
                                        <button type="submit" class="btn-sm btn btn-outline-danger" value="<?= $allChannels[$i]['id'] ?>" name="chanDelete">
                                            delete
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form method="post">
                                        <button type="submit" class="btn-sm btn btn-outline-dark" value="<?= $allChannels[$i]['id'] ?>" name="chanModify">
                                            modify
                                        </button>
                                    </form>
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

            <h5 class="text-fat text-black">Users</h5>
            <div class="vh-50 overflow-auto p-2 shadow-sm rounded-2 mb-2">
                <table class="table w-100 overflow-scroll">
                    <?php   if(isset($allUsers)){ ?>

                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rights</th>
                            <th>Connected</th>
                            <th>Delete</th>
                            <th>Modify</th>
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
                                    <b class="h6 text-black"><?= $allUsers[$i]['rights'] ?><b>
                                </td>

                                <td>
                                    <b class="h6 text-black"><?= $allUsers[$i]['connected'] ?></b>
                                </td>

                                <td>
                                    <form method="post">
                                        <button type="submit" class="btn-sm btn btn-outline-danger" value="<?= $allUsers[$i]['id'] ?>" name="usersDelete">
                                            delete
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form method="post">
                                        <button type="submit" class="btn-sm btn btn-outline-dark" value="<?= $allUsers[$i]['id'] ?>" name="usersModify">
                                            modify
                                        </button>
                                    </form>
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

            <h5 class="text-fat text-black">Messages</h5>
            <div class="vh-50 overflow-auto p-2 shadow-sm rounded-2">
                <table class="table w-100 overflow-scroll">

                    <?php   if(isset($allMessages)){ ?>

                        <tr>
                            <th>Id</th>
                            <th>Sent By</th>
                            <th>Date</th>
                            <th>Content</th>
                            <th>On Channel</th>
                            <th>Delete</th>
                            <th>Modify</th>
                        </tr>

                        <?php for($i=0;$i<=isset($allMessages[$i]);$i++){  ?>
                            <tr>

                                <td>
                                    <form method="post" class="text-cherry text-start shadow-sm">
                                        <button type="submit" class="border border-0 h5 bg-light text-start" value="<?= $allMessages[$i]['id'] ?>" name="chan">
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

                                <td>
                                    <form method="post">
                                        <button type="submit" class="btn-sm btn btn-outline-danger" value="<?= $allMessages[$i]['id'] ?>" name="messagesDelete">
                                            delete
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form method="post">
                                        <button type="submit" class="btn-sm btn btn-outline-dark" value="<?= $allMessages[$i]['id'] ?>" name="messagesModify">
                                            modify
                                        </button>
                                    </form>
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

require_once('footer.php');

require_once('main.php');




