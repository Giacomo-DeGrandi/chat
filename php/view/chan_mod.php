<?php

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry p-4">MODIFY CHANNEL</h3>

        <?php  if(isset($selectedChan)){ ?>
            <!--  channels table & form -->
            <div class="d-flex flex-column align-items-center justify-content-center p-1 rounded-2 shadow-sm mb-2">
                <form method="post" class="p-3 w-75 d-flex flex-column" action="">
                    <div class="d-flex">
                        <p class="h5 p-2">modifying channel id:<b> <?=  $selectedChan[0]['id'];  ?></b> </p>
                        <p class="h5 p-2">last update:<b> <?=  $selectedChan[0]['last_update'];  ?></b> </p>
                        <p class="h5 p-2">date of creation:<b> <?=  $selectedChan[0]['date_of_creation'];  ?></b> </p>
                    </div>
                    <label for="channelName" class="h5 p-2">Name</label>
                    <input type="text" name="updChanName" value="<?=  $selectedChan[0]['name'];  ?>" class="p-2 rounded-pill big border border-1 border-cherry text-black">
                    <label for="channelDesc" class="h5 p-2">Description</label>
                    <input type="text" name="updChanDesc"  value="<?=  $selectedChan[0]['description'];  ?>" class="p-2 rounded-pill border border-1 border-cherry text-black mb-3">
                    <button type="submit" class="btn-outline-cherry rounded-pill bg-white mb-3" value="<?=  $selectedChan[0]['id']; ?>" name="modifyChannel">modify channel</button>
                    <input type="hidden" class="d-none"  name="date_of_creation" value="<?=  $selectedChan[0]['date_of_creation']; ?>">
                </form>
            </div>
        <?php   }  ?>
        </div>

    </div>
<?php

$chanMod = ob_get_clean();



