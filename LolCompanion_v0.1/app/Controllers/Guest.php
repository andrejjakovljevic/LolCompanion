<?php

namespace App\Controllers;

class Guest extends BaseController
{
	public function index()
	{
		echo view('template/header.php');
		echo view('pages/login.php');
        echo view('template/footer.php');
	}

    public function loginSubmit(){
/*
        if(!$this->validate(['korime'=>'required', 'lozinka'=>'required'])){
            return $this->prikaz('login', 
                ['errors'=>$this->validator->getErrors()]);
        }
		*/
        $autorModel=new AutorModel();
        $autor=$autorModel->find($this->request->getVar('korime'));
        if($autor==null)
            return $this->login('Korisnik ne postoji');
        if($autor->lozinka!=$this->request->getVar('lozinka'))
            return $this->login('Pogresna lozinka');
        
        $this->session->set('autor', $autor);
        return redirect()->to(site_url('Korisnik'));
    }
}
