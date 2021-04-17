<?php

namespace App\Controllers;
use App\Models\KorisnikModel;

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
            return $this->login('Niste popunili sva polja');
        }
        $korisnikModel=new KorisnikModel();
        $user=$korisnikModel->find($this->request->getVar('username'));
        if($user==null)
            return $this->login('Korisnik ne postoji');
        if($user->password!=$this->request->getVar('password'))
            return $this->login('Pogresna lozinka');
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
            return $this->signUp('Niste popunili sva polja');
        }

        $korisnikModel=new KorisnikModel();
		if($this->request->getVar('password1') != $this->request->getVar('password2')) {
			return $this->signUp('Passwords do not match');
		}
		$user = [];
		$user['summonerName'] = $this->request->getVar('username');
		$user['email'] = $this->request->getVar('email');
		$user['role'] = 2;
		$user['password'] = $this->request->getVar('password1');
		var_dump($user);
		$korisnikModel->insert($user);
        //return redirect()->to(site_url('Guest/login'));
	}
}
