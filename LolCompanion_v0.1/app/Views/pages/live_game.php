<?php/**
 * Autori: Aleksandar Maksimovic 18/0016
 */?>
<?php use App\Controllers\LoggedUser;?>
                
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
            
            <?php
            for ($i = 1; $i < 6; ++$i) {
                echo '
            <div class="row fensi" style="padding-left: 6%;">
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src="' . base_url('iconsChampions/image'. $names['summoner1'.$i]['champ'] . '.png') . '" style="width: 50%;"><br>
                    <img src="' . base_url('iconsSummonerSpells/'. $names['summoner1'.$i]['sp1']). '" style="width: 20%; padding: 0px;">
                    <img src="' . base_url('iconsSummonerSpells/'. $names['summoner1'.$i]['sp2']). '" style="width: 20%; padding: 0px;"><br>
                    <a href ="' . base_url('LoggedUser/summoner/'. $names['summoner1'.$i]['name']) . '">' . $names['summoner1'.$i]['name'] . '</a>
                </div>
                <div class="col-lg-1">'. $names['summoner11']['winrate'] . '</div>
                <div class="col-lg-1" style="padding-left: 0px;">'. (($names['summoner1'.$i]['d'] == 0) ? 0 : number_format(($names['summoner1'.$i]['k'] + $names['summoner1'.$i]['a']) / $names['summoner1'.$i]['a'], 2)) . '</div>
                <div class="col-lg-2 text-outline" style="font-size: 95%; padding-left: 10px;">
                    <span style="color: ' . LoggedUser::StaticDivToColor(explode(" ", $names['summoner1'.$i]['div'])[0]) .'" > '.$names['summoner1'.$i]['div']. '</span>
                </div>';
                echo '
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-2 text-outline"><span style="color:' .LoggedUser::StaticDivToColor(explode(" ", $names['summoner2'.$i]['div'])[0]) .'"> '.$names['summoner2'.$i]['div'].'</span> </div>
                <div class="col-lg-1" style="padding-left: 0px;">'. (($names['summoner2'.$i]['d'] == 0) ? 0 : number_format(($names['summoner2'.$i]['k'] + $names['summoner2'.$i]['a']) / $names['summoner2'.$i]['a'], 2)) . '</div>
                <div class="col-lg-1" style="padding-left: 30px;">'. $names['summoner2'.$i]['winrate'].' </div>
                <div class="col-lg-1" style="text-align: center; font-size: 60%;">
                    <img src="'. base_url('iconsChampions/image'. $names['summoner2'.$i]['champ'] .'.png'). '" style="width: 50%;"><br>
                    <img src="'. base_url('iconsSummonerSpells/'. $names['summoner2'.$i]['sp1']).'" style="width: 20%; padding: 0px;">
                    <img src="'. base_url('iconsSummonerSpells/'. $names['summoner2'.$i]['sp2']).'" style="width: 20%; padding: 0px;"><br>
                    <a href ="'. base_url('LoggedUser/summoner/' . $names['summoner2'.$i]['name']).'">' . $names['summoner2'.$i]['name'] . '</a>
                </div>
            </div>';
            }?>