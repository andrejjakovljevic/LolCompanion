<?php
/*
 * Autori: 
 * Veljko Rvovic 18/0132
 * 
 * Controllers\Admin - klasa za prikaz i obavljanje adminskih funkcionalnosti
 * 
 * @version 1.0
 */
namespace App\Controllers;

require_once __DIR__  . "../../../vendor/autoload.php";


use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use App\Models\ChampionModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use voku\helper\HtmlDomParser;
use RiotAPI\DataDragonAPI\DataDragonAPI;
use JonnyW\PhantomJs\Client;
use App\Models\BuildModel;



class Admin extends Moderator {

    /**
     * Prikaz admin panela sa opcionom porukom
     * 
     * @param String $msg
     */
    public function index($msg = "") {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/admin', ['msg' => $msg]);
        echo view('template/footer');
    }

    /**
     * Azurira trenutni API key
     * DEPRECATED
     * 
     * @return void
     */
    public function updateAPI() {
        if(!$this->validate(['api' => 'required'])){
            return $this->index('Field must not be empty');
        }
        if (!preg_match("/^RGAPI-[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->request->getVar('api')))
        {
            return $this->index('API key is not valid');
        }
        $model = new GlobalModel();
        $model->save([
            'name' => 'api',
            'value' => $this->request->getVar('api')
        ]);
        return $this->index('API key successfully changed');
    }

    /*
     * Azurira stranicu 'Statistics'
     * DEPRECATED
     * 
     */
    public function updateStatistics() 
    {
        DataDragonAPI::initByCDN();
        $model = new GlobalModel();
        $api = $model->find('api');
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => $api->value,
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
			LeagueAPI::SET_DATADRAGON_INIT   => true,
        ]);

        $model = new ChampionModel();
        $roles = ['top', 'jungle', 'middle', 'adc', 'support'];
        $br = 0;
        foreach(DataDragonAPI::getStaticChampions()["data"] as $champ) {
            if ($br++>10)
                break;
            $model->save([
                'id' => $champ["key"],
                'name' => $champ["name"]
            ]);
        }
        $buildModel = new BuildModel();
        $buildModel->truncate();
        return $this->index('Successfully updated');
    }
    
    /**
     * Uklanja korisnicki nalog iz baze i ispisuje poruku
     * 
     * @return void
     */
    public function RemoveAccount(){
        if(!$this->validate(['summonerName' => 'required'])){
            return $this->index('Field must not be empty');
        }
        
        $model = new KorisnikModel();
        $user = $model->find($this->request->getVar('summonerName'));
        if($user == null){
            return $this->index('Account does not exist');
        }
        else if($user->role == 0){
            return $this->index('User is an Admin');
        }
        $model->delete($this->request->getVar('summonerName'));
        return $this->index('User'. $user->summonerName. ' removed');
    }
    
    /**
     * Dodaje korisniku status moderatora i ispisuje poruku
     * 
     * @return void
     */
    public function AddModerator(){
        if(!$this->validate(['summonerName' => 'required'])){
            return $this->index('Field must not be empty');
        }
        
        $model = new KorisnikModel();
        $user = $model->find($this->request->getVar('summonerName'));
        if($user == null){
            return $this->index('Account does not exist');
        }
        
        if($user->role == 0 || $user->role == 1){
            return $this->index('User is already a Moderator');
        }
        else{
            $user->role = 1;
            $model->save($user);
            return $this->index("User " . $user->summonerName . " promoted to Moderator");
        }
    }
    
    /**
     * Uklanja status moderatora korisnika i ispisuje poruku
     * 
     * @return void
     */
    public function RemoveModerator(){
        if(!$this->validate(['summonerName' => 'required'])){
            return $this->index('Field must not be empty');
        }
        
        $model = new KorisnikModel();
        $user = $model->find($this->request->getVar('summonerName'));
        if($user == null){
            return $this->index('Account does not exist');
        }
        
        if($user->role != 0 && $user->role != 1){
            return $this->index('User is not a Moderator');
        }
        else if($user->role == 0){
            return $this->index('User is an Admin');
        }
        else{
            $user->role = 2;
            $model->save($user);
            return $this->index("User " . $user->summonerName . " is no longer a Moderator");
        }
    }
    
}