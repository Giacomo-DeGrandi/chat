<?php



ob_start();
?>
    <div class="container-fluid p-2">
        <div class="d-flex align-items-center justify-content-center justify-content-evenly">
            <div class="display-5 col-lg-1"></div>
            <a href="../../index.php" class="display-5 col-lg-3">MXG</a>
            <?php   if(isset($_SESSION['connected']) && isset($_SESSION['rights'])){  ?>
                <?php   if($_SESSION['connected'] === '1'){  ?>

                    <form method="post" class="col-lg-2 ms-3">
                        <button type="submit" class="text-center border border-0 rounded-pill shadow display-7 " name="logout">Log out</button>
                    </form>

                    <a href="../../php/view/profil.php" class="text-center border border-0 rounded-pill shadow display-7 col-lg-2 ms-3">Account</a>
                    <a href="../../php/view/channels.php" class="text-center border border-0 rounded-pill shadow display-7 col-lg-2 ms-3">Hall</a>

                    <?php   if($_SESSION['rights'] === '42'){ ?>

                        <a href="../../php/view/admin.php" class="text-center border border-0 rounded-pill shadow display-7 col-lg-2 ms-3">Admin</a>

                    <?php  }  ?>

                <?php   }   ?>

            <?php   } else {  ?>

                <div class="display-5 col-lg-1"></div>
                <a href="../../php/view/connexion.php" class="text-center border border-0 rounded-pill shadow display-7 col-lg-2">LOG IN</a>
                <a href="../../php/view/inscription.php" class="text-center border border-0 rounded-pill shadow display-7 col-lg-2 ms-3">SIGN UP</a>

            <?php   }  ?>

        </div>
    </div>
<?php
$header = ob_get_clean();


