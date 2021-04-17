            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="../slike/lolporo.png" style="width: 35%;">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class = "col-lg-12 text-center naslov" style="padding: 0;">
                                Welcome to LolCompanion
                            </div>
                            <div style="color:red;">
                                <?php echo "$poruka"?>
                            </div>
                            <hr>
                            <form class="form" action = "<?= site_url("Guest/signUpSubmit") ?>">
                                <input type="text" size="30" placeholder="Enter E-mail Address" name = "email">
                                <br> <br>
                                <input type="text" size="30" placeholder="Enter Your Summoner Name" name = "username"> 
                                <br> <br>
                                <input type="password" size="30" placeholder="Enter Password" name = "password1"> 
                                <br> <br>
                                <input type="password" size="30" placeholder="Confirm your Password" name = "password2"> 
                                <br> <br>
                                <input type="submit" value="Sign Up">
                            </form>
                        </div>
                    </div> 
                </div>
            </div>