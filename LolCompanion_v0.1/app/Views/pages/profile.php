            <div class="row" style="padding: 1%;">
                <div class="col-lg-12 text-center naslov" style="padding: 0px;">
                    Gindra <br>
                    <span style="color:goldenrod; font-size: 30px">GOLD IV</span> 
                </div>
            </div>
            <div class = "row">
                <div class="col-lg-2">

                </div>
                <div class = "col-lg-8 text-center naslov" style="padding-top: 0;padding-bottom: 25;">
                    <div class="progress" style="height: 100%;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                          <span style="color:black; font-size: 150%;">70/100 Poros</span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-4">
                    <h3>Xin Zhao</h3>
                    <img src="slike/XinZhao_0.jpg" style="width: 90%;"><br>
                    50% in 18 games
                </div>
                <div class="col-lg-4">
                    <h3>Jinx</h3>
                    <img src="slike/Jinx_0.jpg" style="width: 90%;"><br>
                    33% in 15 games
                </div>
                <div class="col-lg-4">
                    <h3>Jayce</h3>
                    <img src="slike/Jayce_0.jpg" style="width: 90%;"><br>
                    40% in 12 games
                </div>
            </div>
            <div class="row naslov text-center">
                <div class="col-lg-12">
                    Match History
                    <img src="../slike/Line.png" class="center" height="20px">
                </div>
            </div>
            <div class="container" style="background-color: rgba(100, 149, 237, 0.5); margin-bottom: 30px; border: 1pt solid darkred;">
            <?php
            foreach($matches as $match)
            {
                echo '
                <div class="row" ' . ($match['stats']->win == 1 ? '' : 'style = "background-color: rgba(237, 100, 100, 0.5)"') . '>
                    <div class = "col-lg-2 col-md-6 col-xs-12">
                        <div style="margin-top: 20px;">
                            ' . $match['info']->gameType . '<br>' . $match['info']->gameMode . '<br>
                            <span style=""> '. $match['ago'] . ' ago</span>
                            <br>' .
                            ($match['stats']->win == 1 ? 'Victory' : 'Defeat') .
                            '<br>
                        </div>
                    </div>
                    <div class = "col-lg-1 col-md-6 col-xs-12" >
                        <img src="../iconsChampions/image' . $match['stats']->championName . '.png" style="height: 60px; padding: 2px; margin-top:20px">
                        <img src="../iconsSummonerSpells/' . $match['summ1'] . '" style="height: 25px; padding: 2px; margin-right: 0px;">
                        <img src="../iconsSummonerSpells/' . $match['summ2'] . '" style="height: 25px; padding: 2px;">
                    </div>
                    <div class = "col-lg-2 text-center">
                        <div style="margin-top: 20px;">
                            '. $match['stats']->kills . '/' . $match['stats']->deaths . '/' . $match['stats']->assists . '<br>
                            Level ' . $match['stats']->champLevel . ' <br>
                            ' . ($match['stats']->totalMinionsKilled + $match['stats']->neutralMinionsKilled) . ' cs (' .
                            number_format(($match['stats']->totalMinionsKilled + $match['stats']->neutralMinionsKilled) / $match['info']->gameDuration * 1000 * 60, 2) . ' cs/m)
                            <br>
                            ' . date("i", $match['info']->gameDuration / 1000) . ' min
                        </div>
                    </div>
                    <div class = "col-lg-2">
                        <div style="margin: 6px; margin-top:20px">
                            <img src="' . $match['stats']->item0 . '" style="height: 30px;">
                            <img src="' . $match['stats']->item1 . '" style="height: 30px;">
                            <img src="' . $match['stats']->item2 . '" style="height: 30px;">
                        </div>
                        <div style="margin: 6px;">
                            <img src="' . $match['stats']->item3 . '" style="height: 30px;">
                            <img src="' . $match['stats']->item4 . '" style="height: 30px;">
                            <img src="' . $match['stats']->item5 . '" style="height: 30px;">
                        </div>
                    </div>
                    <div class = "col-lg-2" style="font-size:15px;">
                        <div>
                            <div style="margin: 1px;">
                                <img src="../iconsChampions/image' . $match['players'][0]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][0]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][1]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][1]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][2]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][2]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][3]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][3]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][4]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][4]['summonerName'] . '
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-2" style="font-size:15px;">
                        <div>
                            <div style="margin: 1px;">
                                <img src="../iconsChampions/image' . $match['players'][5]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][5]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][6]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][6]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][7]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][7]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][8]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][8]['summonerName'] . '
                                <br>
                                <img src="../iconsChampions/image' . $match['players'][9]['champion'] . '.png" style="height: 15px;">
                                ' . $match['players'][9]['summonerName'] . '
                            </div>
                        </div>
                    </div>
                </div> <hr style="margin:0px;">';
            }
            ?>
            </div>