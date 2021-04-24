<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Autor: Dragan Milovancevic 18/0153-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url('stil.css')?>">
        <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
        <title>LolCompanion</title>
    </head>
    <body>
        <div class="container-fluid font">
            <div class="row header" style="font-size: 16px;">
                <div class="col-lg-3">
                    <img src="<?= base_url('slike/lolporo.png')?>" style="width: 20%;">
                    <a href="<?= site_url("LoggedUser") ?>" class="basic">LoLCompanion</a>
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
                    <a href="<?= site_url("LoggedUser/Challenges")?>" class="basic">Challenges</a>  
                </div>
                <div class="col-lg-1 align-self-center">
                    <a href="<?= site_url("LoggedUser/Champions")?>" class="basic">Champions</a>  
                </div>
                <div class="col-lg-2 align-self-center" >
                    <div class="btn-group">
                        <button type="button" style="background-color: #FF7070; border-color: #FF7070;" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo "$username" ?></button>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                            <li><a class="dropdown-item" href="dummy_profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="<?= site_url("LoggedUser/changePassword") ?>">Change<br>password</a></li>
                            <?php if ($role == 0 || $role == 1)
                                echo '<li><a class="dropdown-item" href="' . site_url("Moderator/allChallenges") . '">All challenges</a></li>'
                            ?>
                            <?php if ($role == 0)
                                echo  '<li><a class="dropdown-item" href="' . site_url("Admin") . '">Admin Panel</a></li>'
                            ?>
                            <li><a class="dropdown-item" href="<?= site_url("LoggedUser/logout") ?>" >LogOut</a></li>
                        </ul>
                    </div>
                </div>
            </div>