<?php

session_start();


$title = 'Modify';

$footer = '';
$script = '';


require_once('../model/Model.php');
require_once('../model/User.php');
require_once('../controller/admin_controller.php');

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry">MODIFY</h3>


            <!--  channels table & form -->
            <div class="d-flex p-1 rounded-2 shadow-sm mb-2">
                <form method="post" class="p-1">
                    <p class="h6 p-1">Add a channel here </p>
                    <label for="channelName" class="h6">Name</label>
                    <input type="text" name="channelName" class="rounded-pill border border-1 border-cherry text-white">
                    <label for="channelDesc" class="h6">Description</label>
                    <input type="text" name="channelDesc" class="rounded-pill border border-1 border-cherry text-white">
                    <button type="submit" class="btn-outline-cherry rounded-pill bg-white" name="addChannel">add +</button>
                </form>
            </div>

            <div class="vh-50 overflow-auto p-2 shadow-sm rounded-2 mb-2">
            </div>

        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('../controller/header_controller.php');

require_once('header.php');

require_once('main.php');


