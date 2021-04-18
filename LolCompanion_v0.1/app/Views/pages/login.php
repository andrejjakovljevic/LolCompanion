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
                                Login
                            </div>
                                <div style="color:red;">
                                    <?php echo "$poruka"?>
                                </div>
                            <hr>
                            <form action="<?= site_url("Guest/LoginSubmit") ?>" method="post" class="form" name="loginForm">
                                <input type="text" id="username" name="username" size="30" placeholder="Enter Username">
                                <br> <br>
                                <input type="password" id="password" name="password" size="30" placeholder="Enter Password">
                                <br> <br>
                                <input type="submit" value="Log In"><a href="<?= site_url("Guest/SignUp") ?>"> ...or Signup</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>