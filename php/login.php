<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="stil.css">
        <title>LolCompanion</title>
    </head>
    <body>
        <div class="container-fluid">
            <?php include 'header.php' ?>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="slike/lolporo.png" style="width: 35%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1>Login</h1>
                            <hr>
                            <form action="loginForm.php" method="post" class="form">
                                <input type="text" id="username" name="username" size="30" placeholder="Enter Username">
                                <br> <br>
                                <input type="password" id="password" name="password" size="30" placeholder="Enter Password">
                                <br> <br>
                                <input type="submit" value="Log In"></a> <a href="signup.php"> ...or Signup</a>
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
