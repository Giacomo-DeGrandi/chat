<?php

$title = 'Log In';

$footer = '';



ob_start();
?>

    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center p-5 bg-cherry-white">
            <div class="bg-white p-4 rounded rounded-2 shadow">

                <div class="d-flex align-items-center justify-content-center">
                    <div class="display-1 p-3">
                        Log In
                    </div>
                </div>

                <form action="" method="POST">

                    <div class="py-2 p-2">
                        <label for="email" class="py-1 text-cherry"><b>EMAIL</b></label><br>
                        <input type="text" class="p-1 border border-0 bg-light-d rounded-pill" id="inputEmail" placeholder="Email" name="email">
                    </div>

                    <div class="py-2 p-2">
                        <label for="password" class="py-1 text-cherry"><b>PASSWORD</b></label><br>
                        <input type="password" class="p-1 border border-0 bg-light-d rounded-pill" id="inputPassword" placeholder="Password" name="password">
                    </div>

                    <div class="py-2 p-2">
                        <button type="submit" class="btn btn-outline-cherry rounded-pill p-2" name="submit_connection">connect</button>
                    </div>

                    <div class="py-2">
                        <p>You don't have an account yet? &#160; <a href="inscription.php" class="p-3 display-7">Sign Up</a></p>
                    </div>

                </form>

            </div>
        </div>

    </div>

<?php

$main = ob_get_clean();

require_once('header.php');

require_once('main.php');


