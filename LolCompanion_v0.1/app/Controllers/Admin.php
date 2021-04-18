<?php

namespace App\Controllers;

require_once __DIR__  . "../../../vendor/autoload.php";

use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;


class Admin extends LoggedUser {

    public function index($msg = "") {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/admin', ['msg' => $msg]);
        echo view('template/footer');
    }

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
}