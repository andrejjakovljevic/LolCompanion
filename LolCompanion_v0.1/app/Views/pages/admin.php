            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class = "col-lg-12 text-center naslov" style="padding: 0; font-weight: normal;">
                            Admin Panel
                        </div>
                    </div>
                    <div class="row">
                        <form action="<?= site_url("Admin/RemoveAccount") ?> " method="post">
                        <div class="col-lg-2">
                            <label>Remove Account:</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" size="25" name="summonerName">
                        </div>
                        <div class="col-lg-1">
                            <input type="Submit" value="Remove">
                        </div>
                        </form>
                        <form action="<?= site_url("Admin/UpdateAPI") ?>" method="post">
                            <div class="col-lg-6" style="padding-right: 0;">
                                <label>API Key:</label>
                                <input type="text" size="40" name = "api" placeholder="RGAPI-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx">
                                <input type="Submit" value="Submit">
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        <form action="<?= site_url("Admin/AddModerator") ?> " method="post">
                        <div class="col-lg-2">
                            <label>Add Moderator:</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" size="25" name="summonerName">
                        </div>
                        <div class="col-lg-1">
                            <input type="Submit" value="Add">
                        </div>
                        </form>
                        
                        <form action="<?= site_url("Admin/RemoveModerator") ?> " method="post">
                        <div class="col-lg-2">
                            <label>Remove Moderator:</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" size="25" name="summonerName">
                        </div>
                        <div class="col-lg-1">
                            <input type="Submit" value="Remove">
                        </div>
                        </form>    
                    </div>
                    <br>

                    <div style="color:red; text-align: center;">
                        <?php echo "$msg"?>
                    </div>
                    <div class="row" style="margin-top: 100px;">
                        <div class="col-lg-12 align-self-center">
                            <a href="<?= site_url("Admin/UpdateStatistics")?>"><button class="center" style="width: auto; background-color: red;"><span style="font-weight: bold; font-size: 3em;">
                                Update Statistics
                            </span></button></a>
                        </div>
                    </div>
                </div>
            </div>