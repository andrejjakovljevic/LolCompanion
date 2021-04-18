            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class = "col-lg-12 text-center naslov" style="padding: 0; font-weight: normal;">
                            Admin Panel
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <form action="<?= site_url("Admin/RemoveAccount") ?> " method="post">
                            <label>Remove Account:</label>
                            <input type="text" size="25" name="summonerName">
                            <input type="Submit" value="Remove">
                        </div>
                        </form>
                        <div class="col-lg-6" style="padding-right: 0;">
                        <form action="<?= site_url("Admin/UpdateAPI") ?>" method="post">
                                <label>API Key:</label>
                                <input type="text" size="40" name = "api" placeholder="RGAPI-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx">
                                <input type="Submit" value="Submit">
                         </form>   
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                        <form action="<?= site_url("Admin/AddModerator") ?> " method="post">
                            <label>Add Moderator:</label>
                            <input type="text" size="25" name="summonerName">
                            <input type="Submit" value="Add">
                        </form>
                        </div>
                        <div class="col-lg-6">
                        <form action="<?= site_url("Admin/RemoveModerator") ?> " method="post">
                            <label>Remove Moderator:</label>
                            <input type="text" size="25" name="summonerName">
                            <input type="Submit" value="Remove">
                        </form>
                        </div>
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