<?php

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry p-4">MODIFY MESSAGE</h3>

            <?php  if(isset($selectedMessage)){ ?>
                <!--  channels table & form -->
                <div class="d-flex flex-column align-items-center justify-content-center p-1 rounded-2 shadow-sm mb-2">
                    <form method="post" class="p-3 w-75 d-flex flex-column" action="">
                        <div class="d-flex">
                            <p class="h5 p-3">modifying message id:<b> <?=  $selectedMessage[0]['id'];  ?></b> </p>
                            <p class="h5 p-3">sent by: <span class="text-fat"> <?=  $userName[0][0];  ?></span> </p>
                            <p class="h5 p-3">date :<b> <?=  $selectedMessage[0]['date'];  ?></b> </p>
                        </div>
                        <div class="d-flex">
                            <p class="h5 p-3">content:<b> <?=  $selectedMessage[0]['content'];  ?></b> </p>
                            <p class="h5 p-3">on channel :<b class="text-fat"> <?=  $channelMess[0]['name'];  ?></b> </p>
                        </div>

                        <label for="updMessCont" class="h5 p-2">Content</label>
                        <input type="text" name="updMessCont" id="updMessCont" value="<?=  $selectedMessage[0]['content'];  ?>" class="p-2 rounded-pill h5 big border border-1 border-cherry text-black">

                        <label for="updMessChannel" class="h5 p-2">Channel</label>
                        <select id="updMessChannel" class="h5 p-1 border border-1 rounded-pill mb-2" name="updMessChannel" value="<?=  $selectedMessage[0]['id_channel'];  ?>">
                            <?php  for($l=0;$l<=isset($allChan[$l]);$l++){ ?>
                                <option value="<?=  $allChan[$l];  ?>"> <?= $allChan[$l]; ?></option>
                            <?php } ?>
                        </select>

                        <button type="submit" class="btn-outline-cherry rounded-pill bg-white mb-3" value="<?=  $selectedMessage[0]['id']; ?>" name="modifyMessage">modify message</button>
                        <input type="hidden" class="d-none"  name="updMessChanId" value="<?=  $selectedMessage[0]['id_channel']; ?>">
                        <input type="hidden" class="d-none"  name="updMessDateId" value="<?=  $selectedMessage[0]['date']; ?>">
                        <input type="hidden" class="d-none"  name="updMessUserId" value="<?=  $selectedMessage[0]['sent_by']; ?>">
                    </form>
                </div>
            <?php   }  ?>
        </div>

    </div>
<?php

$messageMod = ob_get_clean();

