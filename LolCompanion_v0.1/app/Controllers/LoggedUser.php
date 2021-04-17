<?php

namespace App\Controllers;

class LoggedUser extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
}
