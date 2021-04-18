<html>
    <head>
        <!-- Autor: Veljko Rvovic 18/0132-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="stil.css">
        <title>LolCompanion</title>
        <link rel="shortcut icon" type="image/png" href="slike/lolporo.png">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row header" style="font-size: 16px;">
                <div class="col-lg-3">
                    <img src="slike/lolporo.png" style="width: 20%;">
                    <a href="index_loggedin.html" class="basic">LoLCompanion</a>
                </div>
                <div class="col-lg-3">
                    &nbsp;
                </div>
                <div class="col-lg-1 align-self-center">
                    <a href="statistics.html" class="basic">Statistics</a>
                </div>
                <div class="col-lg-1 align-self-center">
                    <a href="live_game.html" class="basic">Live game</a> 
                </div>
                <div class="col-lg-1 align-self-center">
                    <a href="challenges.html" class="basic">Challenges</a>  
                </div>
                <div class="col-lg-1 align-self-center">
                    <a href="champions.html" class="basic">Champions</a>  
                </div>
                
                <div class="col-lg-1 align-self-center" >
                    <div class="btn-group">
                        <button type="button" style="background-color: #FF7070; border-color: #FF7070;" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Gindra</button>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                            <li><a class="dropdown-item" href="dummy_profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="changePassword.html">Change<br>password</a></li>
                            <li><a class="dropdown-item" href="challenges_mod.html">All challenges</a></li>
                            <li><a class="dropdown-item" href="admin.html">Admin Panel</a></li>
                            <li><a class="dropdown-item" href="login.html">LogOut</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-1 align-self-center text-left"  style="padding-top: 1%;">
                    <figure><img src="slike/summonerIcon.png"> </figure>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 col-xs-12 naslov">
                    Champions
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/266")?>"><img src="../iconsChampions/imageAatrox.png"></a>
                    <br>
                    Aatrox<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/103")?>"><img src="../iconsChampions/imageAhri.png"></a>
                    <br>
                    Ahri<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/84")?>"><img src="../iconsChampions/imageAkali.png"></a>
                    <br>
                    Akali<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/12")?>"><img src="../iconsChampions/imageAlistar.png"></a>
                    <br>
                    Alistar<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/32")?>"><img src="../iconsChampions/imageAmumu.png"></a>
                    <br>
                    Amumu<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/34")?>"><img src="../iconsChampions/imageAnivia.png"></a>
                    <br>
                    Anivia<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/1")?>"><img src="../iconsChampions/imageAnnie.png"></a>
                    <br>
                    Annie<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/523")?>"><img src="../iconsChampions/imageAphelios.png"></a>
                    <br>
                    Aphelios<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/22")?>"><img src="../iconsChampions/imageAshe.png"></a>
                    <br>
                    Ashe<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/136")?>"><img src="../iconsChampions/imageAurelion Sol.png"></a>
                    <br>
                    Aurelion Sol<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/268")?>"><img src="../iconsChampions/imageAzir.png"></a>
                    <br>
                    Azir<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/432")?>"><img src="../iconsChampions/imageBard.png"></a>
                    <br>
                    Bard<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/53")?>"><img src="../iconsChampions/imageBlitzcrank.png"></a>
                    <br>
                    Blitzcrank<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/63")?>"><img src="../iconsChampions/imageBrand.png"></a>
                    <br>
                    Brand<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/201")?>"><img src="../iconsChampions/imageBraum.png"></a>
                    <br>
                    Braum<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/51")?>"><img src="../iconsChampions/imageCaitlyn.png"></a>
                    <br>
                    Caitlyn<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/164")?>"><img src="../iconsChampions/imageCamille.png"></a>
                    <br>
                    Camille<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/69")?>"><img src="../iconsChampions/imageCassiopeia.png"></a>
                    <br>
                    Cassiopeia<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/31")?>"><img src="../iconsChampions/imageCho'Gath.png"></a>
                    <br>
                    Cho'Gath<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/42")?>"><img src="../iconsChampions/imageCorki.png"></a>
                    <br>
                    Corki<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/122")?>"><img src="../iconsChampions/imageDarius.png"></a>
                    <br>
                    Darius<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/131")?>"><img src="../iconsChampions/imageDiana.png"></a>
                    <br>
                    Diana<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/119")?>"><img src="../iconsChampions/imageDr. Mundo.png"></a>
                    <br>
                    Dr. Mundo<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/36")?>"><img src="../iconsChampions/imageDraven.png"></a>
                    <br>
                    Draven<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/245")?>"><img src="../iconsChampions/imageEkko.png"></a>
                    <br>
                    Ekko<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/60")?>"><img src="../iconsChampions/imageElise.png"></a>
                    <br>
                    Elise<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/28")?>"><img src="../iconsChampions/imageEvelynn.png"></a>
                    <br>
                    Evelynn<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/81")?>"><img src="../iconsChampions/imageEzreal.png"></a>
                    <br>
                    Ezreal<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/9")?>"><img src="../iconsChampions/imageFiddlesticks.png"></a>
                    <br>
                    Fiddlesticks<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/114")?>"><img src="../iconsChampions/imageFiora.png"></a>
                    <br>
                    Fiora<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/105")?>"><img src="../iconsChampions/imageFizz.png"></a>
                    <br>
                    Fizz<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/3")?>"><img src="../iconsChampions/imageGalio.png"></a>
                    <br>
                    Galio<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/41")?>"><img src="../iconsChampions/imageGangplank.png"></a>
                    <br>
                    Gangplank<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/86")?>"><img src="../iconsChampions/imageGaren.png"></a>
                    <br>
                    Garen<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/150")?>"><img src="../iconsChampions/imageGnar.png"></a>
                    <br>
                    Gnar<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/79")?>"><img src="../iconsChampions/imageGragas.png"></a>
                    <br>
                    Gragas<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/104")?>"><img src="../iconsChampions/imageGraves.png"></a>
                    <br>
                    Graves<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/120")?>"><img src="../iconsChampions/imageHecarim.png"></a>
                    <br>
                    Hecarim<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/74")?>"><img src="../iconsChampions/imageHeimerdinger.png"></a>
                    <br>
                    Heimerdinger<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/420")?>"><img src="../iconsChampions/imageIllaoi.png"></a>
                    <br>
                    Illaoi<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/39")?>"><img src="../iconsChampions/imageIrelia.png"></a>
                    <br>
                    Irelia<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/427")?>"><img src="../iconsChampions/imageIvern.png"></a>
                    <br>
                    Ivern<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/40")?>"><img src="../iconsChampions/imageJanna.png"></a>
                    <br>
                    Janna<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/59")?>"><img src="../iconsChampions/imageJarvan IV.png"></a>
                    <br>
                    Jarvan IV<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/24")?>"><img src="../iconsChampions/imageJax.png"></a>
                    <br>
                    Jax<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/126")?>"><img src="../iconsChampions/imageJayce.png"></a>
                    <br>
                    Jayce<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/202")?>"><img src="../iconsChampions/imageJhin.png"></a>
                    <br>
                    Jhin<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/222")?>"><img src="../iconsChampions/imageJinx.png"></a>
                    <br>
                    Jinx<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/145")?>"><img src="../iconsChampions/imageKai'Sa.png"></a>
                    <br>
                    Kai'Sa<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/429")?>"><img src="../iconsChampions/imageKalista.png"></a>
                    <br>
                    Kalista<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/43")?>"><img src="../iconsChampions/imageKarma.png"></a>
                    <br>
                    Karma<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/30")?>"><img src="../iconsChampions/imageKarthus.png"></a>
                    <br>
                    Karthus<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/38")?>"><img src="../iconsChampions/imageKassadin.png"></a>
                    <br>
                    Kassadin<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/55")?>"><img src="../iconsChampions/imageKatarina.png"></a>
                    <br>
                    Katarina<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/10")?>"><img src="../iconsChampions/imageKayle.png"></a>
                    <br>
                    Kayle<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/141")?>"><img src="../iconsChampions/imageKayn.png"></a>
                    <br>
                    Kayn<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/85")?>"><img src="../iconsChampions/imageKennen.png"></a>
                    <br>
                    Kennen<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/121")?>"><img src="../iconsChampions/imageKha'Zix.png"></a>
                    <br>
                    Kha'Zix<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/203")?>"><img src="../iconsChampions/imageKindred.png"></a>
                    <br>
                    Kindred<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/240")?>"><img src="../iconsChampions/imageKled.png"></a>
                    <br>
                    Kled<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/96")?>"><img src="../iconsChampions/imageKog'Maw.png"></a>
                    <br>
                    Kog'Maw<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/7")?>"><img src="../iconsChampions/imageLeBlanc.png"></a>
                    <br>
                    LeBlanc<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/64")?>"><img src="../iconsChampions/imageLee Sin.png"></a>
                    <br>
                    Lee Sin<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/89")?>"><img src="../iconsChampions/imageLeona.png"></a>
                    <br>
                    Leona<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/876")?>"><img src="../iconsChampions/imageLillia.png"></a>
                    <br>
                    Lillia<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/127")?>"><img src="../iconsChampions/imageLissandra.png"></a>
                    <br>
                    Lissandra<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/236")?>"><img src="../iconsChampions/imageLucian.png"></a>
                    <br>
                    Lucian<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/117")?>"><img src="../iconsChampions/imageLulu.png"></a>
                    <br>
                    Lulu<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/99")?>"><img src="../iconsChampions/imageLux.png"></a>
                    <br>
                    Lux<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/54")?>"><img src="../iconsChampions/imageMalphite.png"></a>
                    <br>
                    Malphite<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/90")?>"><img src="../iconsChampions/imageMalzahar.png"></a>
                    <br>
                    Malzahar<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/57")?>"><img src="../iconsChampions/imageMaokai.png"></a>
                    <br>
                    Maokai<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/11")?>"><img src="../iconsChampions/imageMaster Yi.png"></a>
                    <br>
                    Master Yi<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/21")?>"><img src="../iconsChampions/imageMiss Fortune.png"></a>
                    <br>
                    Miss Fortune<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/62")?>"><img src="../iconsChampions/imageMordekaiser.png"></a>
                    <br>
                    Mordekaiser<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/82")?>"><img src="../iconsChampions/imageMorgana.png"></a>
                    <br>
                    Morgana<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/25")?>"><img src="../iconsChampions/imageNami.png"></a>
                    <br>
                    Nami<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/267")?>"><img src="../iconsChampions/imageNasus.png"></a>
                    <br>
                    Nasus<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/75")?>"><img src="../iconsChampions/imageNautilus.png"></a>
                    <br>
                    Nautilus<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/111")?>"><img src="../iconsChampions/imageNeeko.png"></a>
                    <br>
                    Neeko<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/518")?>"><img src="../iconsChampions/imageNidalee.png"></a>
                    <br>
                    Nidalee<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/76")?>"><img src="../iconsChampions/imageNocturne.png"></a>
                    <br>
                    Nocturne<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/56")?>"><img src="../iconsChampions/imageNunu & Willump.png"></a>
                    <br>
                    Nunu & Willump
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/20")?>"><img src="../iconsChampions/imageOlaf.png"></a>
                    <br>
                    Olaf<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/2")?>"><img src="../iconsChampions/imageOrianna.png"></a>
                    <br>
                    Orianna<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/61")?>"><img src="../iconsChampions/imageOrnn.png"></a>
                    <br>
                    Ornn<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/516")?>"><img src="../iconsChampions/imagePantheon.png"></a>
                    <br>
                    Pantheon<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/80")?>"><img src="../iconsChampions/imagePoppy.png"></a>
                    <br>
                    Poppy<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/78")?>"><img src="../iconsChampions/imagePyke.png"></a>
                    <br>
                    Pyke<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/555")?>"><img src="../iconsChampions/imageQiyana.png"></a>
                    <br>
                    Qiyana<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/246")?>"><img src="../iconsChampions/imageQuinn.png"></a>
                    <br>
                    Quinn<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/133")?>"><img src="../iconsChampions/imageRakan.png"></a>
                    <br>
                    Rakan<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/497")?>"><img src="../iconsChampions/imageRammus.png"></a>
                    <br>
                    Rammus<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/33")?>"><img src="../iconsChampions/imageRek'Sai.png"></a>
                    <br>
                    Rek'Sai<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/421")?>"><img src="../iconsChampions/imageRell.png"></a>
                    <br>
                    Rell<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/526")?>"><img src="../iconsChampions/imageRenekton.png"></a>
                    <br>
                    Renekton<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/58")?>"><img src="../iconsChampions/imageRengar.png"></a>
                    <br>
                    Rengar<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/107")?>"><img src="../iconsChampions/imageRiven.png"></a>
                    <br>
                    Riven<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/92")?>"><img src="../iconsChampions/imageRumble.png"></a>
                    <br>
                    Rumble<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/68")?>"><img src="../iconsChampions/imageRyze.png"></a>
                    <br>
                    Ryze<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/13")?>"><img src="../iconsChampions/imageSamira.png"></a>
                    <br>
                    Samira<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/360")?>"><img src="../iconsChampions/imageSejuani.png"></a>
                    <br>
                    Sejuani<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/113")?>"><img src="../iconsChampions/imageSenna.png"></a>
                    <br>
                    Senna<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/235")?>"><img src="../iconsChampions/imageSeraphine.png"></a>
                    <br>
                    Seraphine<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/147")?>"><img src="../iconsChampions/imageSett.png"></a>
                    <br>
                    Sett<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/875")?>"><img src="../iconsChampions/imageShaco.png"></a>
                    <br>
                    Shaco<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/35")?>"><img src="../iconsChampions/imageShen.png"></a>
                    <br>
                    Shen<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/98")?>"><img src="../iconsChampions/imageShyvana.png"></a>
                    <br>
                    Shyvana<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/102")?>"><img src="../iconsChampions/imageSinged.png"></a>
                    <br>
                    Singed<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/27")?>"><img src="../iconsChampions/imageSion.png"></a>
                    <br>
                    Sion<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/14")?>"><img src="../iconsChampions/imageSivir.png"></a>
                    <br>
                    Sivir<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/15")?>"><img src="../iconsChampions/imageSkarner.png"></a>
                    <br>
                    Skarner<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/72")?>"><img src="../iconsChampions/imageSona.png"></a>
                    <br>
                    Sona<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/37")?>"><img src="../iconsChampions/imageSoraka.png"></a>
                    <br>
                    Soraka<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/16")?>"><img src="../iconsChampions/imageSwain.png"></a>
                    <br>
                    Swain<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/50")?>"><img src="../iconsChampions/imageSylas.png"></a>
                    <br>
                    Sylas<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/517")?>"><img src="../iconsChampions/imageSyndra.png"></a>
                    <br>
                    Syndra<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/134")?>"><img src="../iconsChampions/imageTahm Kench.png"></a>
                    <br>
                    Tahm Kench<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/223")?>"><img src="../iconsChampions/imageTaliyah.png"></a>
                    <br>
                    Taliyah<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/163")?>"><img src="../iconsChampions/imageTalon.png"></a>
                    <br>
                    Talon<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/91")?>"><img src="../iconsChampions/imageTaric.png"></a>
                    <br>
                    Taric<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/44")?>"><img src="../iconsChampions/imageTeemo.png"></a>
                    <br>
                    Teemo<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/17")?>"><img src="../iconsChampions/imageThresh.png"></a>
                    <br>
                    Thresh<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/412")?>"><img src="../iconsChampions/imageTristana.png"></a>
                    <br>
                    Tristana<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/18")?>"><img src="../iconsChampions/imageTrundle.png"></a>
                    <br>
                    Trundle<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/48")?>"><img src="../iconsChampions/imageTryndamere.png"></a>
                    <br>
                    Tryndamere<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/23")?>"><img src="../iconsChampions/imageTwisted Fate.png"></a>
                    <br>
                    Twisted Fate<br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/4")?>"><img src="../iconsChampions/imageTwitch.png"></a>
                    <br>
                    Twitch<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/29")?>"><img src="../iconsChampions/imageUdyr.png"></a>
                    <br>
                    Udyr<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/77")?>"><img src="../iconsChampions/imageUrgot.png"></a>
                    <br>
                    Urgot<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/6")?>"><img src="../iconsChampions/imageVarus.png"></a>
                    <br>
                    Varus<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/110")?>"><img src="../iconsChampions/imageVayne.png"></a>
                    <br>
                    Vayne<br><br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/67")?>"><img src="../iconsChampions/imageVeigar.png"></a>
                    <br>
                    Veigar<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/45")?>"><img src="../iconsChampions/imageVel'Koz.png"></a>
                    <br>
                    Vel'Koz<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/161")?>"><img src="../iconsChampions/imageVi.png"></a>
                    <br>
                    Vi<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/254")?>"><img src="../iconsChampions/imageViego.png"></a>
                    <br>
                    Viego<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/234")?>"><img src="../iconsChampions/imageViktor.png"></a>
                    <br>
                    Viktor<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/112")?>"><img src="../iconsChampions/imageVladimir.png"></a>
                    <br>
                    Vladimir<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/8")?>"><img src="../iconsChampions/imageVolibear.png"></a>
                    <br>
                    Volibear<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/106")?>"><img src="../iconsChampions/imageWarwick.png"></a>
                    <br>
                    Warwick<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/19")?>"><img src="../iconsChampions/imageWukong.png"></a>
                    <br>
                    Wukong<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/498")?>"><img src="../iconsChampions/imageXayah.png"></a>
                    <br>
                    Xayah<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/101")?>"><img src="../iconsChampions/imageXerath.png"></a>
                    <br>
                    Xerath<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/5")?>"><img src="../iconsChampions/imageXin Zhao.png"></a>
                    <br>
                    Xin Zhao<br>&nbsp;
                </div>
            </div>
            <div class="row text-center slike">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/157")?>"><img src="../iconsChampions/imageYasuo.png"></a>
                    <br>
                    Yasuo<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/777")?>"><img src="../iconsChampions/imageYone.png"></a>
                    <br>
                    Yone<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/83")?>"><img src="../iconsChampions/imageYorick.png"></a>
                    <br>
                    Yorick<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/350")?>"><img src="../iconsChampions/imageYuumi.png"></a>
                    <br>
                    Yuumi<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/154")?>"><img src="../iconsChampions/imageZac.png"></a>
                    <br>
                    Zac<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/238")?>"><img src="../iconsChampions/imageZed.png"></a>
                    <br>
                    Zed<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/115")?>"><img src="../iconsChampions/imageZiggs.png"></a>
                    <br>
                    Ziggs<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/26")?>"><img src="../iconsChampions/imageZilean.png"></a>
                    <br>
                    Zilean<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/142")?>"><img src="../iconsChampions/imageZoe.png"></a>
                    <br>
                    Zoe<br><br>&nbsp;
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <a href="<?php site_url("$role/Champion/143")?>"><img src="../iconsChampions/imageZyra.png"></a>
                    <br>
                    Zyra<br><br>&nbsp;
                </div>
            </div>            
            <div class="row footer">
                <div class="col-lg-12">
                    &nbsp; by NoodleSoft
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script> 
    </body>
</html>