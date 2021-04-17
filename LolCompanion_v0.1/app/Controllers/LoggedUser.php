<?php

namespace App\Controllers;

class LoggedUser extends BaseController
{
	public function index()
	{
        $data = [];
        $data['Controller']='LoggedUser';
        $data['role'] = $this->session->get('user')->role;
        $data['username'] = $this->session->get('user')->summonerName;
        echo view('template/header_loggedin.php',$data);
        echo view('template/footer.php');
	}
}
