<?php


$title = 'Sign Up';


$header = '';
$footer = '';


ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center p-5">
            <div class="display-1">
                Sign Up
            </div>

        </div>

        <div class="d-flex align-items-center justify-content-center bg-rose p-5">
            <div class="d-flex align-items-center justify-content-center bg-ligth p-5">
                <div class="w-50">
                    <form class="input-group">
                        <input type="text" class="text">
                        <input type="text" class="text">
                        <input type="email" class="text">
                        <input type="password" class="text">
                    </form>
                </div>
            </div>

        </div>

    </div>

<?php

$main = ob_get_clean();


require_once('main.php');



