<form action="<?= site_url("Moderator/addQuestSubmit") ?>" method="POST">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class = "col-lg-12 text-center naslov" style="padding: 0; font-weight: normal;">
                    New Challenge
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                        <label>Name:</label>
                </div>
                <div class="col-lg-4">
                    <input type="text" size="30" name="title" >
                </div>
                <div class="col-lg-3">
                    <label>Champion:</label>
                    <select name="champion" id="champion">
                        <option value="Any">Any</option>
                        <option value="Xin Zhao">Xin Zhao</option>
                        <option value="Aatrox">Aatrox</option>
                        <option value="Olaf">Olaf</option>
                        <option value="Gangplank">Gangplank</option>
                        <option value="Jayce">Jayce</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label>Role:</label>
                    <select name="role" id="role">
                        <option value="Any">Any</option>
                        <option value="Top">Top</option>
                        <option value="Jungle">Jungle</option>
                        <option value="Mid">Mid</option>
                        <option value="ADC">ADC</option>
                        <option value="Support">Support</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label style="vertical-align: top;"> Description: </label>
                </div>
                <div class="col-lg-4">
                    <textarea cols="30" style="resize: none" rows="3" name="description"></textarea>
                </div>
                <form id="addOptionForm" action="<?= site_url("Moderator/addQuestAttribute")?>">
                    <div class="col-lg-3">
                        <label>Option: </label>
                        <select name="option" id="option">
                            <option value="Prerequisite Id">Prerequisite Id</option>
                            <option value="Kills">Kills</option>
                            <option value="Gold">Gold</option>
                            <option value="Gold per minute">Gold per minute</option>
                            <option value="Cs">Cs</option>
                            <option value="Cs per minute">Cs per minute</option>
                            <option value="First turret">First turret</option>
                            <option value="First blood">First blood</option>
                            <option value="Multikill">Multikill</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Value:</label>
                        <input type="text" size = 5>
                    </div>
                    <div class="col-lg-1">
                        <input type="submit" name="Add" value="Add option" form="addOptionForm">
                    </div>
                </form>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label style="vertical-align: top;">
                        Image url:
                    </label>
                </div>
                <div class="col-lg-4">
                    <input type="text" size="30" name="imgurl">
                </div>
            </div>
            <div class="row" style="padding-top: 20px;">
                <div class="col-lg-12 text-center">
                    <input type="submit" value="Add challenge">
                </div>
            </div>
        </div>
    </div>
</form>
<div style="color:red; text-align: center;">
                        <?php echo "$msg"?>
                    </div>