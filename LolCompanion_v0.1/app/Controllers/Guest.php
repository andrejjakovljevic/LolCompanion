<?php

namespace App\Controllers;
use App\Models\KorisnikModel;

class Guest extends BaseController
{
	public function index($poruka='')
	{
		echo view('template/header.php');
		echo view('pages/login.php', ['poruka' => $poruka]);
        echo view('template/footer.php');
	}

    public function loginSubmit(){
        if(!$this->validate(['username'=>'required', 'password'=>'required'])){
            return $this->index('Niste popunili sva polja');
        }
        $korisnikModel=new KorisnikModel();
        $user=$korisnikModel->find($this->request->getVar('username'));
        if($user==null)
            return $this->index('Korisnik ne postoji');
        if($user->password!=$this->request->getVar('94dac85bf941127fe3a8cfd55d749f2e816c6188fd7ed0e78713362ab9d53cd8'))
            return $this->index('Pogresna lozinka');
        
        $this->session->set('user', $user);
        return redirect()->to(site_url('LoggedUser'));
    }
}
