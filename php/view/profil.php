<?php

session_start();


$title = 'Account';


require_once('../model/Model.php');
require_once('../model/User.php');
require_once('../controller/profil_controller.php');



ob_start();
?>
    <script type="text/javascript" src="../../public/js/profil.js"></script>
<?php
$script = ob_get_clean();

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-start p-5">
           <div class="h2 text-fat">YOUR ACCOUNT</div>
        </div>

        <div class="d-flex align-items-center justify-content-center p-2">
            <div class="h4 text-fat">Your personal informations</div>
        </div>

        <div class="d-flex flex-column align-items-center">

            <table class="table w-75 flex-wrap">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rights</th>
                    <th>Date of birth</th>
                    <th>status</th>
                </tr>

                <tr>
                    <?php if(isset($userInfo)){  ?>

                    <td><?= $userInfo[0]['id']  ?></td>
                    <td><?= $userInfo[0]['name']  ?></td>
                    <td><?= $userInfo[0]['email']  ?></td>
                        <?php if($userInfo[0]['rights']==='42'){ ?>
                            <td>Administrator</td>
                        <?php } elseif($userInfo[0]['rights']==='1'){ ?>
                            <td>User</td>
                        <?php } ?>
                    <td><?= $userInfo[0]['dob']  ?></td>
                    <td>🟢</td>

                    <?php } ?>
                </tr>

            </table>

            <form method="post" action="" class="p-5 w-75" id="formUpdate">
                <div class="h3 text-fat py-4 mb-3">Settings</div>
                <div class="h5 mb-3">Modify your personal infos</div>

                <div class="py-1 text-start">
                    <label for="username" class="py-1 text-cherry">USERNAME</label><br>
                    <input type="text" autocomplete="off" value="<?= $userInfo[0]['name'] ?>" class="p-1 border border-0 bg-light-d rounded-pill w-100" name="username" id="username">
                    <small></small>
                </div>

                <div class="py-1 text-start">
                    <label for="email" class="py-1 text-cherry">EMAIL</label><br>
                    <input type="email" autocomplete="off"  value="<?= $userInfo[0]['email'] ?>" class="p-1 border border-0 bg-light-d rounded-pill w-100" name="email" id="email">
                    <small></small>
                </div>

                <div class="py-1 text-start">
                    <label for="password" class="py-1 text-cherry">PASSWORD</label><br>
                    <input type="password" autocomplete="off" class="p-1 border border-0 bg-light-d rounded-pill w-100"  name="password" id="password">
                    <small class="flex-wrap"></small>
                </div>

                <div class="py-1 text-start">
                    <label for="passwordConf" class="py-1 text-cherry">CONFIRM PASSWORD</label><br>
                    <input type="password" autocomplete="off" class="p-1 border border-0 bg-light-d rounded-pill w-100" name="passwordConf" id="passwordConf">
                    <small></small>
                </div>

                <div class="py-4 p-4">
                    <button type="submit" class="btn btn-outline-cherry shadow rounded-pill p-2 w-100" value="<?= $userInfo[0]['id'] ?>" id="submitUpdateUser">
                        <i class="text-fat">modify</i>
                    </button>
                </div>

            </form>


            <div class="d-flex align-items-center justify-content-center p-2">
                <div class="h4 text-fat">Messages Info</div>
            </div>

            <table class="table w-75 p-5">
                <?php if(isset($occ)){   ?>
                    <?php foreach($occ as $k => $v ){   ?>
                    <tr>

                        <th><?= $k ?> </th>
                        <th>Channel you've been most involved</th>
                        <th>Period of most activity</th>
                    </tr>
                    <?php }  ?>
                <tr>
                    <?php if(isset($countMessages) and !empty($countMessages)){ ?>
                        <td><?= $countMessages[0][0];  ?></td>
                    <?php } else {  ?>
                        <td>You haven't sent any message yet</td>
                    <?php } ?>
                </tr>

            </table>

            <table class="table w-75 p-5">
                <tr>
                    <th>Total number of messages sent</th>
                    <th>Channel you've been most involved</th>
                    <th>Period of most activity</th>
                </tr>

                <tr>
                    <?php if(isset($countMessages) and !empty($countMessages)){ ?>
                            <td><?= $countMessages[0][0];  ?></td>
                    <?php } else {  ?>
                            <td>You haven't sent any message yet</td>
                    <?php } ?>
                </tr>

            </table>

            <div class="d-flex align-items-center justify-content-center p-2">
                <div class="h4 text-fat">Your Messages</div>
            </div>

            <table class="table w-75">

                <tr>
                    <th>Date</th>
                    <th>Content</th>
                    <th>On Channel</th>
                </tr>

                <?php if(isset($userMessages) and !empty($userMessages)){ ?>


                    <?php for($j=0;$j<=isset($userMessages[$j]);$j++){  ?>

                         <tr>

                            <td><?= $userMessages[$j]['date']  ?></td>
                            <td><?= $userMessages[$j]['content']  ?></td>
                            <td><?= $userMessages[$j]['id_channel']  ?></td>

                         </tr>

                    <?php } ?>

                <?php } else {  ?>

                    <tr>
                        <td>You haven't sent any message yet</td>
                    </tr>

                <?php } ?>

            </table>

        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('../controller/header_controller.php');

require_once('header.php');

require_once('footer.php');

require_once('main.php');




