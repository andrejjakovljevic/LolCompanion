<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\GlobalModel;

class Guest extends BaseController
{
	public function index($poruka='')
	{
		echo view('template/header.php');
		echo view('pages/index.php', ['poruka' => $poruka]);
                echo view('template/footer.php');
	}

	public function login($poruka='')
	{
		echo view('template/header.php');
		echo view('pages/login.php', ['poruka' => $poruka]);
		echo view('template/footer.php');
	}
	
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

	public function signUp($poruka = '') {
            echo view('template/header.php');
            echo view('pages/signup.php', ['poruka' => $poruka]);
            echo view('template/footer.php');
        }
	
	public function signUpSubmit() {
        if(!$this->validate(['username'=>'required', 'password1'=>'required', 'email'=>'required', 'password2'=>'required'])){
            return $this->signUp('Please fill in all the required fields!');
        }
        $korisnikModel=new KorisnikModel();
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
        if (property_exists($sum, 'status'))
        {
            return $this->signUp('Username does not exists in the League of Legends Database');
        }
                
        $user = [];
        $user['summonerName'] = $this->request->getVar('username');
        $user['email'] = $this->request->getVar('email');
        $user['role'] = 2;
        $user['password'] = hash("sha256",$this->request->getVar('password1'),false);
        $korisnikModel->insert($user);
        return redirect()->to(site_url('Guest/login'));
    }

	public function champions($role = "")
	{
		return parent::champions("Guest");
	}

	public function champion($id, $role = "") {
		return parent::champion($id, "Guest");
	}
}
