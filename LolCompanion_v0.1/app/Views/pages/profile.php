            <div class="row" style="padding: 1%;">
                <div class="col-12 text-center naslov" style="padding: 0px;">
                    <?= $name ?> <br>
                    <?php echo $division ?>
                </div>
            </div>
            <div class = "row">
                <div class="col-2">

                </div>
                <div class = "col-8 text-center naslov" style="padding-top: 0;padding-bottom: 25;">
                    <div class="progress" style="height: 100%;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                          <span style="color:black; font-size: 150%;">70/100 Poros</span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row text-center">
                <?php
                for ($i = 0; $i < 3; ++$i) {
                    echo '
                        <div class="col-4">
                            <h3>' . $champs['champ'][$i] . '</h3>
                            <img src="' . $champs['splash'][$i] . '" style="width: 90%;"><br>
                            ' . number_format(100 * $champs['wins'][$i] / $champs['games'][$i], 0) . '% in ' . $champs['games'][$i] . ' games
                        </div>';
                }
                ?>
            </div>
            <div class="row naslov text-center">
                <div class="col-12">
                    Match History
                    <img src="<?= base_url('/slike/Line.png')?>" class="center" height="20px">
                </div>
            </div>
            <div class="container" style="background-color: rgba(100, 149, 237, 0.5); margin-bottom: 30px; border: 1pt solid darkred;">
            <?php
            foreach($matches as $match)
            {
                echo '
                <div class="row" style = "background-color: ' . ($match['stats']->win == 1 ? 'rgba(100, 149, 237, 0.5)' : 'rgba(237, 100, 100, 0.5)"') . ';">
                    <div class = "col-lg-2 col-sm-3 col-xs-3 text-center">
                        <div style="margin-top: 20px;">
                            ' . $match['info']->gameMode . '<br>
                            <span style=""> '. $match['ago'] . ' ago</span>
                            <br>' .
                            ($match['stats']->win == 1 ? 'Victory' : 'Defeat') .
                            '<br>
                        </div>
                    </div>
                    <div class = "col-lg-1 col-sm-2 col-xs-2 text-center" >
                        <img src="'. base_url('/iconsChampions/image' . $match['stats']->championName . '.png') . '"' . ' style="height: 60px; padding: 2px; margin-top:20px">
                        <img src="' .base_url('/iconsSummonerSpells/' . $match['summ1']) . '" style="height: 25px; padding: 2px; margin-right: 0px;">
                        <img src="' .base_url('/iconsSummonerSpells/' . $match['summ2']) . '" style="height: 25px; padding: 2px;">
                    </div>
                    <div class = "col-lg-2 col-sm-3 col-xs-3 text-center">
                        <div style="margin-top: 20px;">
                            '. $match['stats']->kills . '/' . $match['stats']->deaths . '/' . $match['stats']->assists . '<br>
                            Level ' . $match['stats']->champLevel . ' <br>
                            ' . ($match['stats']->totalMinionsKilled + $match['stats']->neutralMinionsKilled) . ' cs (' .
                            number_format(($match['stats']->totalMinionsKilled + $match['stats']->neutralMinionsKilled) / $match['info']->gameDuration * 1000 * 60, 2) . ' cs/m)
                            <br>
                            ' . date("i", $match['info']->gameDuration / 1000) . ' min
                        </div>
                    </div>
                    <div class = "col-lg-2 col-sm-4 col-xs-4 text-center">
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
                    <div class = "col-lg-2 col-sm-4 col-xs-4" style="font-size:14px;">
                        <div>
                            <div style="margin: 1px;">
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][0]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][0]['summonerName']) . '>' . $match['players'][0]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][1]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][1]['summonerName']) . '>' . $match['players'][1]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][2]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][2]['summonerName']) . '>' . $match['players'][2]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][3]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][3]['summonerName']) . '>' . $match['players'][3]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][4]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][4]['summonerName']) . '>' . $match['players'][4]['summonerName'] . '</a>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-2 col-sm-4 col-xs-4" style="font-size:14px">
                        <div>
                            <div class = "sm-right" style="margin: 1px;">
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][5]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][5]['summonerName']) . '>' . $match['players'][5]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][6]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][6]['summonerName']) . '>' . $match['players'][6]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][7]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][7]['summonerName']) . '>' . $match['players'][7]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][8]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][8]['summonerName']) . '>' . $match['players'][8]['summonerName'] . '</a>
                                <br>
                                <img src="'. base_url('/iconsChampions/image' . $match['players'][9]['champion'] . '.png') . '"' . ' style="height: 15px;">
                                <a href=' . site_url('LoggedUser/summoner/' . $match['players'][9]['summonerName']) . '>' . $match['players'][9]['summonerName'] . '</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="margin:0px; width: 0%;">';
            }
            ?>
            </div>