<?php session_start();
if (!($_SESSION["loggedin"] == 1)) {
    header("Location: http://localhost");
}?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="stil.css">
        <title>LolCompanion</title>
    </head>
    <body>
        <div class="container-fluid">
            <?php include 'header.php' ?>
            <div class="row" style="padding: 5%;">
                <div class="col-lg-6 text-right align-self-center">
                    <img src="slike/summonerIcon.png" style="width: 18%;">
                </div>
                <div class="col-lg-6 text-left">
                    <h1>Gindra</h1>
                </div>
            </div>
            <div class="row champions text-center">
                <div class="col-lg-4">
                    <h3>Xin Zhao</h3>
                    <img src="slike/XinZhao_0.jpg" style="width: 90%;"><br>
                    68% in 18 games
                </div>
                <div class="col-lg-4">
                    <h3>Jinx</h3>
                    <img src="slike/Jinx_0.jpg" style="width: 90%;"><br>
                    34% in 15 games
                </div>
                <div class="col-lg-4">
                    <h3>Jayce</h3>
                    <img src="slike/Jayce_0.jpg" style="width: 90%;"><br>
                    63% in 12 games
                </div>
            </div>
            <div class="row footer">
                <div class="col-lg-12">
                    &nbsp; by NoodleSoft
                </div>
            </div>
        </div>
    </body>
</html>