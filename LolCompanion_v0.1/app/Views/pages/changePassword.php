
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="../slike/lolporo.png" style="width: 35%;">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class = "col-lg-12 text-center naslov" style="padding: 0;">
                                Change password
                            </div>
                           <div style="color:red;">
                                <?php echo "$msg"?>
                            </div>
                            <hr>
                            <form class="form" action="<?= site_url("LoggedUser/ChangePasswordSubmit") ?> " method="post">
                                <input type="password" size="30" placeholder="Enter Current Passowrd" name="curpass">
                                <br> <br>
                                <input type="password" size="30" placeholder="Enter New Passowrd" name="newpass1">
                                <br> <br>
                                <input type="password" size="30" placeholder="Confirm New Password" name="newpass2"> 
                                <br> <br>
                                <input type="submit" value="Confirm">
                            </form>
                        </div>
                    </div> 
                </div>