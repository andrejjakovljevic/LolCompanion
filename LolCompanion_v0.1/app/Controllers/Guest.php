<?php

namespace App\Controllers;

class Guest extends BaseController
{
	public function index()
	{
		echo view('template/header.php');
                echo view('template/footer.php');
	}
}
