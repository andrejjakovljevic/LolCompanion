<?php
/**
 * Autori: Veljko Rvovic 18/0132
 */
?>
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
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $poroUser?>" aria-valuemin="0" aria-valuemax="<?php echo $poroTotal?>" style="width:<?php echo 100.0 * $poroUser / ($poroTotal == 0 ? 1 : $poroTotal) ?>%">
                          <span style="color:black; font-size: 150%;"><?php echo $poroUser . '/' . $poroTotal . ' Poros' ?></span>
                        </div>
                    </div>
                    
                </div>
                <img src="<?= base_url('slike/Line.png') ?>" class="center" height="20px">
            </div>
            <div class="container" style="background-color: rgba(100, 149, 237, 0.5); marging-bottom: 10px; border: 1pt solid darkred;">
            <?php foreach($quests as $quest) {
                $attrStr = "";
                foreach($quest['attributes'] as $attr){
                    $attrStr = $attrStr . '' . $attr->attributeKey;
                    $attrStr = $attrStr. ': '. $attr->attributeValue ."<br>";
                }
                echo '
                <div class = "row" style="padding-bottom: 5px; ' . ($quest['completed'] == 1 ? 'background-color: rgba(55,255,125,0.6); color: #666666; ' : '') . '">
                   <div class="text-center vertical-center" style="position: absolute; height: 100px; margin-top: 40px; width: 100%; margin-left: -180px; color: rgb(125,255,125); font-size:24pt;">
                    ' . ( $quest['completed'] == 1 ? 'Completed' : '') . '
                    </div>
                    <div class = "col-lg-9 col-md-6 col-xs-12" >
                        ' . $quest['title'] . '
                        <br>
                        <img src="' . $quest['image'] . '" style="height: 60px;float: left; padding-right: 10px; padding-top: 2px;">
                        <span>' . $quest['description'] . '</span> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12" style="height: 100px; overflow-y: auto;">
                    '.
                        $attrStr
                    .'
                    </div>
                </div>
                <hr style="margin-bottom: 5px; margin-top: 0; margin-bottom:0">';
            }
            ?>
<!--                <div class = "row">
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
                </div>-->
            </div>
            