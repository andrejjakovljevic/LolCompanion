            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="<?= base_url('slike/lolporo.png') ?>" style="width: 35%;">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class = "col-lg-12 text-center naslov" style="padding: 0;">
                                LolCompanion
                            </div>
                            <hr>
                            <form class="form" action="
                                  <?php
                                    if (!isset($_SESSION['user']))
                                    {
                                        echo site_url('Guest/searchChampion');
                                    }
                                    else
                                    {
                                        echo site_url('LoggedUser/searchChampion');
                                    }
                                  ?>
                                  ">
                                <input type="image" src="../slike/glass.png" width="1.8%">
                                <input type="text" size="30" placeholder="Input champion name" name="champName"> 
                            </form>
                        </div>
                    </div> 
                </div>
            </div>