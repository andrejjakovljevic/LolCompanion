<?php 
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use RiotAPI\DataDragonAPI\DataDragonAPI;
$url_base = "https://fastcdn.mobalytics.gg/assets/lol/images/perks/";
$br =0;
$br2 = 3;
if ($typeSec=="domination" || $typeSec=="precision")
{
    $br2=4;
}
$pom=4;
$brattr=0; 
if ($type=="domination") $pom=3;
?>            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="naslov"><?php echo $name?></h1>
                    <br> <span style="font-size: large"><?php echo $role ?></span>
                    <hr>
                    <?php echo $icon ?>
                </div>
            </div>
            <div class="row items text-center">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo $item1 ?>" style="width: 100%"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo base_url("/slike/arrow1.png"); ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo $item2 ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo base_url("/slike/arrow1.png"); ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo $item3 ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo base_url("/slike/arrow1.png"); ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo $item4 ?>" style="width: 100%"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo base_url("/slike/arrow1.png"); ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo $item5 ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo base_url("/slike/arrow1.png"); ?>" style="width: 100%;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo $item6 ?>" style="width: 100%;"></div>
            </div>
            <div class="row">
                <div class="col-12" style="text-align: center; font-size: xx-large; font-weight: bold">Winrate: <?php echo $winrate ?>%</div>
            </div>
            <div class="container runes text-center">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <?php 
                        if ($type=="domination" || $type=="precision")
                        {
                            echo '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="';
                            echo ($url_base . $niz[$type][$br] . ".png");
                            echo '" style="width: 100%;';
                            if ((in_array($niz[$type][$br],$perks)))
                            {
                                echo "border: 3pt solid black;";
                            }
                            echo "\"></div>";
                            $br++;
                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">&nbsp;</div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                </div>
                
                <div class="row" >
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">&nbsp;</div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                </div>
                
                 <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$type][$br] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$type][$br],$perks)) echo "border: 3pt solid black;"; $br++;?>"></div>
                    <?php 
                        if ($type=="domination")
                        {
                            echo '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="';
                            echo ($url_base . $niz[$type][$br] . ".png");
                            echo '" style="width: 100%;';
                            if ((in_array($niz[$type][$br],$perks)))
                            {
                                echo "border: 3pt solid black";
                            }
                            echo "\"></div>";
                            $br++;
                        }
                    ?>
                    <div class="col-lg-<?php echo $pom;?> col-md-<?php echo $pom;?> col-sm-<?php echo $pom;?> col-xs-<?php echo $pom;?>">&nbsp;</div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $niz[$typeSec][$br2] . ".png");?>" style="width: 100%; <?php if (in_array($niz[$typeSec][$br2],$perks)) echo "border: 3pt solid black;"; $br2++;?>"></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        &nbsp;
                    </div>
                </div>
                <div class="row attrperks">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">&nbsp;</div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red1"][0] . ".png");?>" style="width: 100%; <?php if ($attrperks[0]==$nizAttrPerk["red1"][0]) echo "border: 3pt solid black;";?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red1"][1] . ".png");?>" style="width: 100%; <?php if ($attrperks[0]==$nizAttrPerk["red1"][1]) echo "border: 3pt solid black;";?>"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red1"][2] . ".png");?>" style="width: 100%; <?php if ($attrperks[0]==$nizAttrPerk["red1"][2]) echo "border: 3pt solid black;";?>"></div>
                </div>
                
                <div class="row attrperks">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">&nbsp;</div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red2"][0] . ".png");?>" style="width: 100%; <?php if ($attrperks[1]==$nizAttrPerk["red2"][0]) echo "border: 3pt solid black;";?>"></div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red2"][1] . ".png");?>" style="width: 100%; <?php if ($attrperks[1]==$nizAttrPerk["red2"][1]) echo "border: 3pt solid black;";?>"></div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red2"][2] . ".png");?>" style="width: 100%; <?php if ($attrperks[1]==$nizAttrPerk["red2"][2]) echo "border: 3pt solid black;";?>"></div>
                </div>
                
                <div class="row attrperks">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">&nbsp;</div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red3"][0] . ".png");?>" style="width: 100%; <?php if ($attrperks[2]==$nizAttrPerk["red2"][0]) echo "border: 3pt solid black;";?>"></div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red3"][1] . ".png");?>" style="width: 100%; <?php if ($attrperks[2]==$nizAttrPerk["red2"][1]) echo "border: 3pt solid black;";?>"></div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img src="<?php echo ($url_base . $nizAttrPerk["red3"][2] . ".png");?>" style="width: 100%; <?php if ($attrperks[2]==$nizAttrPerk["red2"][2]) echo "border: 3pt solid black;";?>"></div>
                </div>
                <div class="row" style="margin-bottom: 30px">
                    <div class="col-12" style="text-align: right">
                        as per: <a href="https://app.mobalytics.gg/lol/champions/">Mobalytics</a>
                    </div>
                </div>
            </div>
