<?php

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry">MODIFY CHANNEL</h3>

        <?php  if(isset($selectedChan)){ ?>
            <!--  channels table & form -->
            <div class="d-flex flex-column align-items-center justify-content-center p-1 rounded-2 shadow-sm mb-2">
                <form method="post" class="p-3 w-75 d-flex flex-column">
                    <p class="h p-2">Modify channel id: <?=  $selectedChan[0]['id'];  ?> </p>
                    <label for="channelName" class="h6 p-2">Name</label>
                    <input type="text" name="updChanName" value="<?=  $selectedChan[0]['name'];  ?>" class="p-2 rounded-pill big border border-1 border-cherry text-black">
                    <label for="channelDesc" class="h6 p-2">Description</label>
                    <input type="text" name="updChanDesc"  value="<?=  $selectedChan[0]['description'];  ?>" class="p-2 rounded-pill border border-1 border-cherry text-black mb-3">
                    <button type="submit" class="btn-outline-cherry rounded-pill bg-white" value="<?=  $selectedChan[0]['id']; ?>" name="modifyChannel">modify</button>
                    <input type="hidden" name="date_of_creation" value="<?=  $selectedChan[0]['date_of_creation']; ?>">
                </form>
            </div>
        <?php   }  ?>
        </div>

    </div>
<?php

$chanMod = ob_get_clean();



