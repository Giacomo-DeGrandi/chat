<?php

ob_start();
?>
    <div class="container-fluid p-2">
        <div class="d-flex align-items-center justify-content-center justify-content-evenly">
            <div class="display-5 col-lg-1"></div>
            <a href="../../index.php" class="display-5 col-lg-3">MXG</a>
            <div class="display-5 col-lg-1"></div>
            <a href="../../php/view/connexion.php" class="text-center border border-0 rounded-pill shadow display-7 col-lg-2">LOG IN</a>
            <a href="../../php/view/inscription.php" class="text-center border border-0 rounded-pill shadow display-7 col-lg-2 ms-3">SIGN UP</a>
            <div class="h6 col-lg-1 text-black"></div>
            <a href="" class="h6 col-lg-2 text-black">ABOUT</a>
        </div>
    </div>
<?php
$header = ob_get_clean();


