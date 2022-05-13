<?php

session_start();

$title = 'Sign Up';

$footer = '';

require_once('../model/Model.php');
require_once('../model/User.php');
require_once('../controller/header_controller.php');


ob_start();
?>
    <script type="text/javascript" src="../../public/js/inscription.js"></script>
<?php
$script = ob_get_clean();



ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center p-5 bg-gold-white">
            <div class="bg-white p-4 rounded rounded-2 shadow flex-wrap">

                <div class="d-flex align-items-center justify-content-center p-4">
                        <div class="display-1 p-2 text-nowrap">
                            Sign Up
                        </div>
                </div>

                <form action="connexion.php" method="POST" id="formSub">

                    <div class="py-1 text-start">
                        <label for="username" class="py-1 text-cherry">USERNAME</label><br>
                        <input type="text" autocomplete="off" class="p-1 border border-0 bg-light-d rounded-pill w-100" name="username" id="username">
                        <small></small>
                    </div>

                    <div class="py-1 text-start">
                        <label for="email" class="py-1 text-cherry">EMAIL</label><br>
                        <input type="email" autocomplete="off" class="p-1 border border-0 bg-light-d rounded-pill w-100" name="email" id="email">
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

                    <div class="py-1 row text-start">
                        <div class="col d-flex flex-column text-start">
                            <label for="date" class="py-1 text-cherry">DATE OF BIRTH</label><br>
                            <input type="date" class="p-2 border border-0 rounded-pill bg-light-d w-75" name="date" id="date">
                            <small></small>
                        </div>
                        <div class="col d-flex flex-column text-start text-nowrap">
                            <label for="terms" class="py-1 text-cherry">TERMS</label><br>
                            <div class="row w-75">
                                <p class="small h6">I've read and I accept<br><a href="../../divers/TERMS.txt" class=" p-2">all the Terms</a>
                                    <input type="checkbox" class="p-2 border border-0 bg-cherry-white" name="terms" id="termsBox">
                                    <br><small class="text-danger"></small>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="py-4 p-4">
                        <button type="submit" class="btn btn-outline-cherry shadow rounded-pill p-2 w-100" id="submitSub">
                            <i class="text-fat">subscribe</i>
                        </button>
                    </div>

                    <div class="py-2">
                        <p>You've already subscribe?<a href="connexion.php" class="display-6 p-3">&#160; Log In </a></p>
                    </div>

                </form>

            </div>
        </div>

    </div>

<?php

$main = ob_get_clean();

require_once('../controller/header_controller.php');

require_once('header.php');

require_once('main.php');




