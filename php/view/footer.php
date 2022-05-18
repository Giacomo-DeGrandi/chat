<?php

ob_start();

?>
    <footer class="mt-auto">
        <div class="container-fluid mt-5 py-5">
            <nav class="d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex flex-row justify-content-evenly w-100">
                    <a href="../../index.php" >MXG</a>
                    <a href="https://github.com/Giacomo-DeGrandi" ><img src="divers/icons/github.png" alt="" class="logos bg-white rounded-4"></a>
                    <a href="https://laplateforme.io/"><img src="divers/icons/logowhite%20plat.png" alt="" class="logos bg-black rounded-4"></a>
                </div>
            </nav>
        </div>
    </footer>
<?php

$footer = ob_get_clean();

