<?php

namespace App\Controllers;

require_once __DIR__  . "../../../vendor/autoload.php";



use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use voku\helper\HtmlDomParser;
use RiotAPI\DataDragonAPI\DataDragonAPI;


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

    public function updateStatistics() {
		DataDragonAPI::initByCDN();
		$model = new GlobalModel();
		$api = $model->find('api');
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => $api->value,
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
			LeagueAPI::SET_DATADRAGON_INIT   => true,
        ]);

        $model = new ChampionsModel();
        foreach(DataDragonAPI::getStaticChampions()["data"] as $champ) {
            model.save($champ['key'], [
                'id' => $champ["key"],
                'name' => $champ["name"]
            ]);
        }

        //$dom = HtmlDomParser::str_get_html($str);
    }
}