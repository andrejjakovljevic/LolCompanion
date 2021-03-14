<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="stil.css">
        <title>LolCompanion</title>
    </head>
    <body>
        <div class="container-fluid">
            <?php include 'header.php'; ?>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="slike/lolporo.png" style="width: 35%;">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1>Welcome to LolCompanion!</h1>
                            <hr>
                            <form class="form">
                                <input type="text" size="30" placeholder="Enter Username">
                                <br> <br>
                                <input type="text" size="30" placeholder="Enter Your Summoner Name"> 
                                <br> <br>
                                <input type="password" size="30" placeholder="Enter Password"> 
                                <br> <br>
                                <input type="password" size="30" placeholder="Confirm your Password"> 
                                <br> <br>
                                <input type="submit" value="Sign Up">
                            </form>
                        </div>
                    </div> 
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