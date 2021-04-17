
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
                            <?php if ($role == "MOD") 
                                echo '<li><a class="dropdown-item" href="challenges_mod.html">All challenges</a></li>'
                            ?>
                            <?php if ($role == "ADMIN")
                                echo  '<li><a class="dropdown-item" href="admin.html">Admin Panel</a></li>'
                            ?>
                            <li><a class="dropdown-item" href="login.html">LogOut</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-1 align-self-center text-left"  style="padding-top: 1%;">
                    <figure><img src="slike/summonerIcon.png"> </figure>
                </div>
            </div>