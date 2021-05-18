<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$br=0;
?>
<style>
    img
    {
        width: 15%;
    }
</style>
<div class = "row">
                <div class = "col-lg-12 text-center naslov" style="padding: 0; font-weight: normal;">
                    Top champions
                </div>
                
                <br>
                
            </div>
            <div>
                <!--
                <img src="slike/Top_icon.webp" style="height: 40px;">
                <img src="slike/Jungle_icon.webp" style="height: 40px;">
                <img src="slike/Middle_icon.webp" style="height: 40px;">
                <img src="slike/Bottom_icon.webp" style="height: 40px;">
                <img src="slike/Support_icon.webp" style="height: 40px;">
                -->
            </div>
            <table class="table table-striped table-bordered table-sm" style="font-size: 24; text-align: center; vertical-align: middle;">
                <thead style="background-color: rgba(138,43,226, 0.3);">
                  <tr>
                    <th scope="col">Role</th>
                    <th scope="col">Champion</th>
                    <th scope="col">Win Rate</th>
                    <th scope="col">Pick Rate</th>
                    <th scope="col">Ban Rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Top</td>
                    <td>
                        <a href="jayce.html">
                        <img style="float: left; line-height: 10px; height: 50; padding-right: 10px; vertical-align: middle;"  src="<?php echo $podaci[$br]["ikonica"]?>">
                        </a>
                        <a href="jayce.html"><?php echo $podaci[$br]["ime"] ?></a>
                    </td>
                    <td style="color: <?php echo floatval(substr($podaci[$br]["winrate"],0, strlen($podaci[$br]["winrate"])-1))>=50?'green':'darkred'; ?>;"><?php echo $podaci[$br]["winrate"] ?></td>
                    <td><?php echo $podaci[$br]["pickrate"] ?></td>
                    <td><?php echo $podaci[$br]["banrate"]; $br++; ?></td>
                  </tr>
                  <tr>
                    <td>Jungle</td>
                    <td>
                        <a href="jayce.html">
                        <img style="float: left; line-height: 10px; height: 50; padding-right: 10px; vertical-align: middle;"  src="<?php echo $podaci[$br]["ikonica"]?>">
                        </a>
                        <a href="jayce.html"><?php echo $podaci[$br]["ime"] ?></a>
                    </td>
                    <td style="color: <?php echo floatval(substr($podaci[$br]["winrate"],0, strlen($podaci[$br]["winrate"])-1))>=50?'green':'darkred'; ?>;"><?php echo $podaci[$br]["winrate"] ?></td>
                    <td><?php echo $podaci[$br]["pickrate"] ?></td>
                    <td><?php echo $podaci[$br]["banrate"]; $br++; ?></td>
                  </tr>
                  <tr>
                    <td>Middle</td>
                    <td>
                        <a href="jayce.html">
                        <img style="float: left; line-height: 10px; height: 50; padding-right: 10px; vertical-align: middle;"  src="<?php echo $podaci[$br]["ikonica"]?>">
                        </a>
                        <a href="jayce.html"><?php echo $podaci[$br]["ime"] ?></a>
                    </td>
                    <td style="color: <?php echo floatval(substr($podaci[$br]["winrate"],0, strlen($podaci[$br]["winrate"])-1))>=50?'green':'darkred'; ?>;"><?php echo $podaci[$br]["winrate"] ?></td>
                    <td><?php echo $podaci[$br]["pickrate"] ?></td>
                    <td><?php echo $podaci[$br]["banrate"]; $br++; ?></td>
                  </tr>
                  <tr>
                    <td>Adc</td>
                    <td>
                        <a href="jayce.html">
                        <img style="float: left; line-height: 10px; height: 50; padding-right: 10px; vertical-align: middle;"  src="<?php echo $podaci[$br]["ikonica"]?>">
                        </a>
                        <a href="jayce.html"><?php echo $podaci[$br]["ime"] ?></a>
                    </td>
                    <td style="color: <?php echo floatval(substr($podaci[$br]["winrate"],0, strlen($podaci[$br]["winrate"])-1))>=50?'green':'darkred'; ?>;"><?php echo $podaci[$br]["winrate"] ?></td>
                    <td><?php echo $podaci[$br]["pickrate"] ?></td>
                    <td><?php echo $podaci[$br]["banrate"]; $br++; ?></td>
                  </tr>
                  <tr>
                    <td>Support</td>
                    <td>
                        <a href="jayce.html">
                        <img style="float: left; line-height: 10px; height: 50; padding-right: 10px; vertical-align: middle;"  src="<?php echo $podaci[$br]["ikonica"]?>">
                        </a>
                        <a href="jayce.html"><?php echo $podaci[$br]["ime"] ?></a>
                    </td>
                    <td style="color: <?php echo floatval(substr($podaci[$br]["winrate"],0, strlen($podaci[$br]["winrate"])-1))>=50?'green':'darkred'; ?>;"><?php echo $podaci[$br]["winrate"] ?></td>
                    <td><?php echo $podaci[$br]["pickrate"] ?></td>
                    <td><?php echo $podaci[$br]["banrate"]; $br++; ?></td>
                  </tr>
                </tbody>
              </table>
