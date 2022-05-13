<?php

session_start();


$title = 'Account';

$footer = '';

if(!$_SESSION['connected']){
    header('location:../../index.php');
}



require_once('../model/Model.php');
require_once('../model/User.php');


ob_start();
?>
    <script type="text/javascript" src="../../public/js/profil.js"></script>
<?php
$script = ob_get_clean();

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center p-5 bg-gold-white">
           <div class="display-1">
               <p>your account</p>
               <p>discussions you follow</p>
               <p>new discussions</p>
           </div>
        </div>

    </div>
<?php

$main = ob_get_clean();

require_once('../controller/header_controller.php');

require_once('header.php');

require_once('main.php');




