<?php

ob_start();
?>
    <div class="container-fluid">

        <div class="d-flex flex-column p-5 bg-light">

            <h3 class="text-fat text-cherry p-4">MODIFY USER</h3>

            <?php  if(isset($selectedUser)){ ?>
                <!--  channels table & form -->
                <div class="d-flex flex-column align-items-center justify-content-center p-1 rounded-2 shadow-sm mb-2 flex-wrap">
                    <form method="post" class="p-3 w-75 d-flex align-items-start justify-content-center flex-column  flex-wrap" action="">

                        <div class="d-flex flex-wrap">
                            <p class="h5 p-3">user id: <b> <?=  $selectedUser[0]['id'];  ?></b> </p>
                            <p class="h5 p-3">name: <b> <?=  $selectedUser[0]['name'];  ?></b> </p>
                            <p class="h5 p-3">email: <b> <?=  $selectedUser[0]['email'];  ?></b> </p>
                            <p class="h5 p-3">extra info: <b> <?=  $selectedUser[0]['data1'];  ?></b> </p>
                        </div>

                        <div class="d-flex flex-wrap">
                        <?php if($selectedUser[0]['rights'] === '42'){  ?>
                                <p class="h5 p-3">rights: <b> Administrator </b> </p>
                            <?php  } else {   ?>
                                <p class="h5 p-3">rights: <b>User</b> </p>
                            <?php  }  ?>

                            <p class="h5 p-3">date of birth:<b> <?=  $selectedUser[0]['dob'];  ?></b> </p>

                            <?php if($selectedUser[0]['connected'] === '1'){  ?>
                                <p class="h5 p-3">connected:<b> 🟢</b> </p>
                            <?php  } else {   ?>
                                <p class="h5 p-3">connected:<b> 🔴</b> </p>
                            <?php  }  ?>
                        </div>

                            <div class="d-flex flex-wrap">

                                <label for="channelName" class="h5 p-3">Name</label>
                                <input type="text" name="updUserName" value="<?=  $selectedUser[0]['name'];  ?>" class="p-3 h5 rounded-pill border border-1 border-cherry text-black mb-3">

                                <label for="channelDesc" class="h5 p-3">Email</label>
                                <input type="text" name="updUserEmail"  value="<?=  $selectedUser[0]['email'];  ?>" class="p-3 h5 rounded-pill border border-1 border-cherry text-black mb-3">

                            </div>

                            <div class="d-flex flex-wrap">

                                <label for="channelDesc" class="h5 p-3">Extra info</label>
                                <input type="text" name="updUserData"  value="<?=  $selectedUser[0]['data1'];  ?>" class="p-3 h5 rounded-pill border border-1 border-cherry text-black mb-3">

                                <label for="rightsUpdate" class="h5 p-3">Rights</label>
                                <select id="rightsUpdate" class="h5 rounded rounded-pill border border-1" name="updUserRights">
                                    <option value="<?=  $selectedUser[0]['rights'];  ?>" > <?= $selectedUser[0]['rights']; ?></option>
                                    <?php for($l=0;$l<=isset($rights[$l]);$l++){ ?>
                                            <?php if( $rights[$l] !== $selectedUser[0]['rights']){ ?>
                                            <option value="<?=  $rights[$l];  ?>"> <?= $rights[$l]; ?></option>
                                            <?php } ?>
                                    <?php } ?>
                                </select>

                            </div>

                        <button type="submit" class="btn-outline-cherry rounded-pill bg-white p-3 mb-3" value="<?=  $selectedUser[0]['id']; ?>" name="modifyUser">modify user</button>
                        <input type="hidden" class="d-none"  name="connected" value="<?=  $selectedUser[0]['connected']; ?>">
                    </form>
                </div>
            <?php   }  ?>
        </div>

    </div>
<?php

$chanMod = ob_get_clean();


