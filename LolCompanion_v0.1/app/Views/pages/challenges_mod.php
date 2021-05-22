<div class = "row">
                <div class = "col-lg-12 text-center naslov" style="padding: 0; font-weight: normal;">
                    All Challenges
                </div>
                <br>
                
            </div>
            <div class = "row">
                <div class="col-lg-12">
                    <a href="<?= site_url("Moderator/addQuest") ?>"><button class="center" style="width: 200px"><span style="font-weight: bold;">New Challenge</span></button></a>
                    <img src= <?= base_url("slike/Line.png")?> class="center" height="20px">
                </div>
            </div>
            <div class="container" style="background-color: rgba(100, 149, 237, 0.5); padding-bottom: 10px; border: 1pt solid darkred;">
                
                <?php foreach($quests as $quest) {
                $attrStr = "id: " . $quest['id'] . '<br>';
                foreach($quest['attributes'] as $attr){
                    $attrStr = $attrStr . '' . $attr->attributeKey;
                    $attrStr = $attrStr. ': '. $attr->attributeValue ."<br>";
                }
                echo '
                <div class = "row" style="padding-bottom: 5px;">
                    <div class = "col-lg-8 col-md-6 col-xs-12" >
                        ' . $quest['title'] . '
                        <br>
                        <img src="' . $quest['image'] . '" style="height: 60px;float: left; padding-right: 10px; padding-top: 2px;">
                        <span>' . $quest['description'] . '</span> 
                    </div>
                    <div class="col-lg-3 col-md-5 col-xs-10" style="overflow-y: auto;">
                    '.
                        $attrStr
                    .'
                    </div>
                    
                    <div class="col-lg-1 col-md-1 col-xs-2">
                        <div>
                        <form method="post" action='. site_url("Moderator/deleteQuest") . '>
                            <input type="hidden" id="questId" name="questId" value=" '. $quest['id'] .'">
                            <input type="image" src="../slike/trash.png" style="height: 50px; margin-top: 10px" alt="delete"></input>
                        </form>
                        </div>
                    </div>
                    
                </div>
                <hr style="margin-bottom: 5px; margin-top: 0;">';
            }
            ?>
            </div>
            
