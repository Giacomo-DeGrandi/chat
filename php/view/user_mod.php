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
                            <p class="h5 p-2">user id: <b> <?=  $selectedUser[0]['id'];  ?></b> </p>
                            <p class="h5 p-2">name: <b> <?=  $selectedUser[0]['name'];  ?></b> </p>
                            <p class="h5 p-2">email: <b> <?=  $selectedUser[0]['email'];  ?></b> </p>
                            <p class="h5 p-2">extra info: <b> <?=  $selectedUser[0]['data1'];  ?></b> </p>
                        </div>

                        <div class="d-flex flex-wrap">
                        <?php if($selectedUser[0]['rights'] === '42'){  ?>
                                <p class="h5 p-2">rights: <b> Administrator </b> </p>
                            <?php  } else {   ?>
                                <p class="h5 p-2">rights: <b>User</b> </p>
                            <?php  }  ?>

                            <p class="h5 p-2">date of birth:<b> <?=  $selectedUser[0]['dob'];  ?></b> </p>

                            <?php if($selectedUser[0]['connected'] === 1){  ?>
                                <p class="h5 p-2">connected:<b>🟢</b> </p>
                            <?php  } else {   ?>
                                <p class="h5 p-2">connected:<b> 🔴</b> </p>
                            <?php  }  ?>
                        </div>

                            <div class="d-flex flex-wrap">
                                <label for="channelName" class="h5 p-2">Name</label>
                                <input type="text" name="updUserName" value="<?=  $selectedUser[0]['name'];  ?>" class="p-1 rounded-pill border border-1 border-cherry text-black mb-3">
                                <label for="channelDesc" class="h5 p-2">Email</label>
                                <input type="text" name="updUserEmail"  value="<?=  $selectedUser[0]['email'];  ?>" class="p-1 rounded-pill border border-1 border-cherry text-black mb-3">
                                <label for="channelDesc" class="h5 p-2">Extra info</label>
                                <input type="text" name="updUserData"  value="<?=  $selectedUser[0]['data1'];  ?>" class="p-1 rounded-pill border border-1 border-cherry text-black mb-3">
                                <label for="rightsUpdate" class="h5 p-2">Rights</label>
                                <select id="rightsUpdate" name="updUserRights" value="<?=  $selectedUser[0]['rights'];  ?>">
                                    <?php for($l=0;$l<=isset($rights[$l]);$l++){ ?>
                                        <option value="<?=  $rights[$l];  ?>"> <?= $rights[$l]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        <button type="submit" class="btn-outline-cherry rounded-pill bg-white p-2 mb-3" value="<?=  $selectedUser[0]['id']; ?>" name="modifyUser">modify</button>
                        <input type="hidden" class="d-none"  name="dob" value="<?=  $selectedUser[0]['dob']; ?>">
                        <input type="hidden" class="d-none"  name="dob" value="<?=  $selectedUser[0]['data1']; ?>">
                    </form>
                </div>
            <?php   }  ?>
        </div>

    </div>
<?php

$chanMod = ob_get_clean();


