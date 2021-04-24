<div class = "row">
                <div class = "col-lg-12 text-center naslov" style="padding: 0; font-weight: normal;">
                    Challenges
                </div>
                
                <br>
                
            </div>
            <div class = "row">
                <div class="col-lg-2">

                </div>
                <div class = "col-lg-8 text-center naslov" style="padding-top: 0;padding-bottom: 25;">
                    <div class="progress" style="height: 100%;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $poroUser?>" aria-valuemin="0" aria-valuemax="<?php echo $poroTotal?>" style="width:<?php echo 1.0 * $poroUser / $poroTotal?>">
                          <span style="color:black; font-size: 150%;"><?php echo $poroUser . '/' . $poroTotal . ' Poros' ?></span>
                        </div>
                    </div>
                    
                </div>
                <img src="<?= base_url('slike/Line.png') ?>" class="center" height="20px">
            </div>
            <div class="container" style="background-color: rgba(100, 149, 237, 0.5); padding-bottom: 10px; border: 1pt solid darkred;">
            <?php foreach($quests as $quest) {
                echo '
                <div class = "row" style="color: #666666; padding-bottom: 5px; ' . ($quest['completed'] == 1 ? 'background-color: #aaaaff; ' : '') . '">
                    <div class = "col-lg-9 col-md-6 col-xs-12" >
                        ' . $quest['title'] . '
                        <br>
                        <img src="' . $quest['image'] . '" style="height: 60px;float: left; padding-right: 10px; padding-top: 2px;">
                        <span>' . $quest['description'] . '</span> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12" style="overflow-y: auto;">
                        Champion: Xin Zhao<br>
                        Role: Top<br>
                        Kills: 6<br>
                    </div>
                </div>
                <hr style="margin-bottom: 5px; margin-top: 0;">';
            }
            ?>
                <div class = "row">
                    <div class = "col-lg-9 col-md-6 col-xs-12" >
                        The Second Quest
                        <br>
                        <img src="../slike/dummyQuestPic.jpg" style="height: 60px;float: left; padding-right: 10px; padding-top: 2px;">
                        <span>Valhala awaits you brave warrior.</span> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12" style="overflow-y: auto;">
                        Champion: Olaf<br>
                        Role: Jungle<br>
                        Kills: 100<br>
                    </div>
                </div>
            </div>
            