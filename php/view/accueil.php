<?php

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center">
            <div class="display-1">
                MXG
            </div>
        </div>

        <div class="d-flex flex-column align-items-start justify-content-center p-2">

            <div class="h1">
                <b>Instant messaging chat!</b>
            </div>
            <div class="h3">
                Write to your friends!<br><br> Participate to talks by subjects<br> in ours Rooms!
            </div>
            <div class="h4 text-center p-3">
                <p>Log In to start messaging</p><br>
                <a class="border border-none p-2 rounded-pill bg-light link-dark" href="connexion.php">log in</a>
            </div>

            <div class="h4 text-center p-3">
                <p>You haven't subscribe yet?</p><br>
                <a class="border border-none p-2 rounded-pill bg-light link-dark" href="inscription.php">subscribe</a>
            </div>

        </div>

    </div>

<?php

$main = ob_get_clean();


