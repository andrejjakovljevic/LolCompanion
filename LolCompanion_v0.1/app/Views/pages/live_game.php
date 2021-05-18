<?php use App\Controllers\LoggedUser;
$tier11 = explode(" ", $names['summoner11']['div'])[0];
$tier12 = explode(" ", $names['summoner12']['div'])[0];
$tier13 = explode(" ", $names['summoner13']['div'])[0];
$tier14 = explode(" ", $names['summoner14']['div'])[0];
$tier15 = explode(" ", $names['summoner15']['div'])[0];
$tier21 = explode(" ", $names['summoner21']['div'])[0];
$tier22 = explode(" ", $names['summoner22']['div'])[0];
$tier23 = explode(" ", $names['summoner23']['div'])[0];
$tier24 = explode(" ", $names['summoner24']['div'])[0];
$tier25 = explode(" ", $names['summoner25']['div'])[0];
?>
                
       
            <div class="row fensi" style="padding-left: 6%;">
                <div class="col-lg-1">
                    &nbsp;
                </div>
                <div class="col-lg-1" style="padding-left: 2%;">
                    WR
                </div>
                <div class="col-lg-1" style="padding-left: 2%;">
                    KDA
                </div>
                <div class="col-lg-1" style="padding-left: 2%;">
                    DIV
                </div>
                <div class="col-lg-3">
                    &nbsp;
                </div>
                <div class="col-lg-1" style="padding-left: 2%;">
                    DIV
                </div>
                <div class="col-lg-1" style="padding-left: 2%;">
                    KDA
                </div>
                <div class="col-lg-1" style="padding-left: 2%;">
                    WR
                </div>
            </div>
            <hr>
            <div class="row fensi" style="padding-left: 6%;">
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner11']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Teleport.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner11']['name'] ?>
                </div>
                <div class="col-lg-1">60%</div>
                <div class="col-lg-1">2/3/4</div>
                <div class="col-lg-2" style="font-size: 95%;">
                    <span style="color: <?php echo LoggedUser::StaticDivToColor($tier11) ?>" > <?= $names['summoner11']['div'] ?> </span>
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-2"><span style="color:<?php echo LoggedUser::StaticDivToColor($tier21) ?>"> <?= $names['summoner21']['div'] ?> </span> </div>
                <div class="col-lg-1"> 4/3/2 </div>      
                <div class="col-lg-1"> 33% </div>
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner21']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Teleport.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner21']['name'] ?>
                </div>
            </div>
            <div class="row fensi" style="padding-left: 6%;">
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner12']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Smite.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner12']['name'] ?>
                </div>
                <div class="col-lg-1">60%</div>
                <div class="col-lg-1">2/3/4</div>
                <div class="col-lg-2" style="font-size: 95%;">
                    <span style="color: <?php echo LoggedUser::StaticDivToColor($tier12) ?>"> <?= $names['summoner12']['div'] ?> </span>
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-2"><span style="color:<?php echo LoggedUser::StaticDivToColor($tier22) ?>"> <?= $names['summoner22']['div'] ?> </span> </div>
                <div class="col-lg-1"> 4/3/2 </div>      
                <div class="col-lg-1"> 33% </div>
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner22']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Smite.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner22']['name'] ?>
                </div>
            </div>
            <div class="row fensi" style="padding-left: 6%;">
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner13']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Ignite.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner13']['name'] ?>
                </div>
                <div class="col-lg-1">60%</div>
                <div class="col-lg-1">2/3/4</div>
                <div class="col-lg-2" style="font-size: 95%;">
                    <span style="color:<?php echo LoggedUser::StaticDivToColor($tier13) ?>"> <?= $names['summoner13']['div'] ?> </span>
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-2"><span style="color:<?php echo LoggedUser::StaticDivToColor($tier23) ?>"> <?= $names['summoner23']['div'] ?> </span> </div>
                <div class="col-lg-1"> 4/3/2 </div>      
                <div class="col-lg-1"> 33% </div>
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner23']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Smite.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner23']['name'] ?>
                </div>
            </div>
            <div class="row fensi" style="padding-left: 6%;">
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner14']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Ignite.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner14']['name'] ?>
                </div>
                <div class="col-lg-1">60%</div>
                <div class="col-lg-1">2/3/4</div>
                <div class="col-lg-2" style="font-size: 95%;">
                    <span style="color:<?php echo LoggedUser::StaticDivToColor($tier14) ?>"> <?= $names['summoner14']['div'] ?></span>
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-2"><span style="color:<?php echo LoggedUser::StaticDivToColor($tier24) ?>"> <?= $names['summoner24']['div'] ?> </span> </div>
                <div class="col-lg-1"> 4/3/2 </div>      
                <div class="col-lg-1"> 33% </div>
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner24']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Teleport.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner24']['name'] ?>
                </div>
            </div>
            <div class="row fensi" style="padding-left: 6%; padding-bottom: 6%;">
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner15']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Ignite.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner15']['name'] ?>
                </div>
                <div class="col-lg-1">60%</div>
                <div class="col-lg-1">2/3/4</div>
                <div class="col-lg-2" style="font-size: 95%;">
                    <span style="color:<?php echo LoggedUser::StaticDivToColor($tier15) ?>"> <?= $names['summoner15']['div'] ?> </span>
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-2">
                    <span style="color:<?php echo LoggedUser::StaticDivToColor($tier25) ?>"> <?= $names['summoner25']['div'] ?> </span> 
                </div>
                <div class="col-lg-1"> 4/3/2 </div>      
                <div class="col-lg-1"> 33% </div>
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src=" <?= base_url('iconsChampions/image'. $names['summoner25']['champ'] .'.png')?>" style="width: 50%;"><br>
                    <img src="slike/Flash.webp" style="width: 20%; padding: 0px;">
                    <img src="slike/Ignite.webp" style="width: 20%; padding: 0px;"><br>
                    <?= $names['summoner25']['name'] ?>
                </div>
            </div>
            

