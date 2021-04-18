<?php

namespace App\Controllers;

require_once __DIR__  . "../../../vendor/autoload.php";

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use RiotAPI\DataDragonAPI\DataDragonAPI;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
                $this->session = session();
	}

	public function champions($role) {
		if ($role == "Guest")
			echo view('template/header');
		else {
			echo view('template/header_loggedin', [
				'role' => $this->session->get('user')->role,
				'username' => $this->session->get('user')->summonerName
			]);
		}
		echo view('pages/champions', ['role' => $role]);
        echo view('template/footer');
	}

	public function champion($id, $role){
		if ($role == "Guest")
			echo view('template/header.php');
		else {
			echo view('template/header_loggedin', [
				'role' => $this->session->get('user')->role,
				'username' => $this->session->get('user')->summonerName
			]);
		}

		DataDragonAPI::initByCDN();
		$model = new GlobalModel();
		$api = $model->find('api');
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => $api->value,
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
			LeagueAPI::SET_DATADRAGON_INIT   => true,
        ]);

        $champion = $api->getStaticChampion($id);
		// echo var_dump($champion);

		$data = [
			'name' => $champion->name,
			'icon' => DataDragonAPI::getChampionIconO($champion),
		];

		echo view('pages/champion', $data);

		/*
        $summoner = $api->getSummonerByName("Gindra");
        $matchlist = $api->getMatchlistByAccount($summoner->accountId);
        foreach ($matchlist as $match) {
            var_dump($match);
            echo "\n";
        }
		*/

        echo view('template/footer');
	}
}
