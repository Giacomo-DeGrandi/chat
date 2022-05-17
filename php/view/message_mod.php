<?php

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry p-4">MODIFY CHANNEL</h3>

            <?php  if(isset($selectedMessage)){ ?>
                <!--  channels table & form -->
                <div class="d-flex flex-column align-items-center justify-content-center p-1 rounded-2 shadow-sm mb-2">
                    <form method="post" class="p-3 w-75 d-flex flex-column" action="">
                        <div class="d-flex">
                            <p class="h5 p-2">modifying message id:<b> <?=  $selectedMessage[0]['id'];  ?></b> </p>
                            <p class="h5 p-2">sent by:<b> <?=  $selectedMessage[0]['sent_by'];  ?></b> </p>
                            <p class="h5 p-2">date :<b> <?=  $selectedMessage[0]['date'];  ?></b> </p>
                        </div>
                        <div class="d-flex">
                            <p class="h5 p-2">content:<b> <?=  $selectedMessage[0]['content'];  ?></b> </p>
                            <p class="h5 p-2">on channel :<b> <?=  $selectedMessage[0]['id_channel'];  ?></b> </p>
                        </div>
                        <label for="channelName" class="h5 p-2">Content</label>
                        <input type="text" name="updChanName" value="<?=  $selectedMessage[0]['content'];  ?>" class="p-2 rounded-pill h5 big border border-1 border-cherry text-black">
                        <button type="submit" class="btn-outline-cherry rounded-pill bg-white mb-3" value="<?=  $selectedMessage[0]['id']; ?>" name="modifyChannel">modify</button>
                        <input type="hidden" class="d-none"  name="date_of_creation" value="<?=  $selectedMessage[0]['id_channel']; ?>">
                        <input type="hidden" class="d-none"  name="date_of_creation" value="<?=  $selectedMessage[0]['date']; ?>">
                        <input type="hidden" class="d-none"  name="date_of_creation" value="<?=  $selectedMessage[0]['sent_by']; ?>">
                    </form>
                </div>
            <?php   }  ?>
        </div>

    </div>
<?php

$messageMod = ob_get_clean();

