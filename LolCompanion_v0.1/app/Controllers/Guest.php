<?php
/*
 * Autori:
 * Andrej Jakovljevic 18/0039
 * 
 * Controllers\Guest
 * 
 * @version 1.0
 */
namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use App\Models\QuestModel;
use App\Models\UserQuestModel;
class Guest extends BaseController
{
        /**
         * Prikaz index stranice sa opcionom porukom
         * 
         * @param String $poruka
         */
	public function index($poruka='')
	{
		echo view('template/header.php');
		echo view('pages/index.php', ['poruka' => $poruka]);
                echo view('template/footer.php');
	}
        
        /**
         * Prikaz stranice za logovanje sa opcionom porukom
         * 
         * @param String $poruka
         */
	public function login($poruka='')
	{
		echo view('template/header.php');
		echo view('pages/login.php', ['poruka' => $poruka]);
		echo view('template/footer.php');
	}
	
        /**
         * Funkcija za logovanje
         * proverava obaveznih polja, hesiranje lozinke,
         * provera postojanja korisnika i lozinke u bazi
         * 
         * @return void
         */
    public function loginSubmit(){
        if(!$this->validate(['username'=>'required', 'password'=>'required'])){
            return $this->login('Please fill in all the required fields!');
        }
        $korisnikModel=new KorisnikModel();
        $user=$korisnikModel->find($this->request->getVar('username'));
        if($user==null)
            return $this->login('User doesn\'t exist');
        $hes=hash("sha256",$this->request->getVar('password'),false);
        $pas=$user->password;
        $nes=strcmp($hes, $pas);
        if ($hes!=$pas)
        {
            return $this->login("Wrong password");
        }
        $this->session->set('user', $user);
        
        return redirect()->to(site_url('LoggedUser'));
    }

    /**
     * Prikaz stranice za registraciju
     * 
     * @param String $poruka
     */
    public function signUp($poruka = '') {
        echo view('template/header.php');
        echo view('pages/signup.php', ['poruka' => $poruka]);
        echo view('template/footer.php');
    }
	
    /**
     * Funkcija za registraciju
     * Proverava sva obavezna polja, da li korisnik sa istim imenom vec postoji
     * i da li postoji nalog u LoL-u sa datim korisnickim imenom
     * 
     * 
     * @return void
     */
    public function signUpSubmit() {
        if(!$this->validate(['username'=>'required', 'password1'=>'required', 'email'=>'required', 'password2'=>'required'])){
            return $this->signUp('Please fill in all the required fields!');
        }
        $korisnikModel=new KorisnikModel();
        $quests = (new QuestModel())->findAll();
        $uqModel = new UserQuestModel();
        $user=$korisnikModel->find($this->request->getVar('username'));
        if ($user!=null)
        {
            return $this->signUp('User already exists');
        }
        if (!filter_var($this->request->getVar('email'), FILTER_VALIDATE_EMAIL)) 
        {
            return $this->signUp('E-mail is in the wrong format');
        }
        if($this->request->getVar('password1') != $this->request->getVar('password2')) {
                return $this->signUp('Passwords do not match');
        }
        $newName= str_replace(" ", "%20", $this->request->getVar('username'));
        $lUrl="https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/" . $newName  . '?api_key=' . GlobalModel::getApiKey();
        $sum=json_decode($this->getHtml($lUrl));
        
        // exception for user with username 'admin'
        if($this->request->getVar('username') != "admin"){
            if (property_exists($sum, 'status'))
            {
                return $this->signUp('Username does not exists in the League of Legends Database');
            }
        }
        
        $user = [];
        $user['summonerName'] = $this->request->getVar('username');
        $user['email'] = $this->request->getVar('email');
        $user['role'] = 2;
        $user['password'] = hash("sha256",$this->request->getVar('password1'),false);
        $korisnikModel->insert($user);
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => GlobalModel::getApiKey(),
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);
        $matchlist = $api->getMatchListByAccount($api->getSummonerByName($summonerName)->accountId)->matches;
        
        $lastGamePlayed = $matchlist[0]->timestamp / 1000;
        foreach($quests as $quest){
            $userQuest = [
                "summonerName" => $this->request->getVar('username'),
                "questId" => $quest->questId,
                "completed" => 0,
                'lastGamePlayed' => $lastGamePlayed
                ];
            $uqModel->insert($userQuest);
        }
        DataDragonAPI::initByCDN();
        

        return redirect()->to(site_url('Guest/login'));
    }

        /**
         * Prikaz informacija o svim herojima
         * 
         * @param String $role - tip korisnika
         * @return void
         */
	public function champions($role = "")
	{
		return parent::champions("Guest");
	}

        /**
         * Prikaz informacija o pojedinom heroju
         * 
         * @param type $id - identifikator heroja
         * @param type $role - tip korisnika
         * @return void
         */
	public function champion($id, $role = "") {
		return parent::champion($id, "Guest");
	}
}
