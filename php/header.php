<?php 
if($_SESSION['loggedin'] == 1) {
    echo '<div class="row header" style="font-size: 16px;">
        <div class="col-lg-3">
            <img src="slike/lolporo.png" style="width: 20%;">
            <a href="index.php" class="basic">LoLCompanion</a>
        </div>
        <div class="col-lg-3">
            &nbsp;
        </div>
        <div class="col-lg-1 align-self-center">
            <a href="*" class="basic">Statistics</a>
        </div>
        <div class="col-lg-1 align-self-center">
            <a href="*" class="basic">Live game</a> 
        </div>
        <div class="col-lg-1 align-self-center">
            <a href="*" class="basic">Challenges</a>  
        </div>
        <div class="col-lg-1 align-self-center text-center">
            <a href="champions.php" class="basic">Champions</a>  
        </div>
        
        <div class="col-lg-1 align-self-center text-right"  style="padding-top: 13px;">
            <figure><img src="slike/summonerIcon.png"> </figure>
        </div>
        
        <div class="col-lg-1 align-self-center" >
            <div class="btn-group">
                <button type="button" style="background-color: #FF7070; border-color: #FF7070;" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Gindra</button>
                <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                    <li><a class="dropdown-item" href="dummy_profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="changePassword.php">Change<br>password</a></li>
                    <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
                </ul>
            </div>
        </div>
    </div>';
}
else {
    echo '<div class="row header">
        <div class="col-lg-3">
            <img src="slike/lolporo.png" style="width: 20%;">
            <a href="index.php" class="basic">LoLCompanion</a>
        </div>
        <div class="col-lg-6 header">
            &nbsp;
        </div>
        <div class="col-lg-1 align-self-center text-center">
            <a href="champions.php" class="basic">Champions</a>  
        </div>
        <div class="col-lg-1">
            &nbsp;
        </div>
        <div class="col-lg-1 align-self-center">
            <a href="login.php" class="basic">Login</a>
        </div>
    </div>';
}
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script> 