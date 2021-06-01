<?php

namespace App\Controllers;

require_once __DIR__  . "../../../vendor/autoload.php";

/**
 * Autor: Andrej Jakovljevic 18/0039,
 */
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use App\Models\ChampionModel;
use App\Models\BuildModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use RiotAPI\DataDragonAPI\DataDragonAPI;
use voku\helper\HtmlDomParser;

/**
 * Kontroler koji sadrzi osnovni skup funckionalnosti koji je potreban svim korisnicima
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

        /**
         * Funckija koja prikazuje informacije o svim herojima, tj. poziva odgovarajuci view
         * @param type $role - Tip koirniska koji je zatrazio prikaz heroja
         */
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

        /**
         * Funkcija koja prima ime sa razmacima i velikim slvoima i pretvara ga u ime bez razmaka i samo sa malim slovima
         * @param type $name
         * @return type
         */
	public static function champName($name) {
		$newchamp = str_replace([' ', "'"], "", $name);
		if ($name == "Nunu&Willump") {
			$newchamp = "nunu";
		}
		return strtolower($newchamp);
	}

        /**
         * Funkcija koja vraca html za odredjeni zahtev
         * @param type $url - url zahteva
         * @param type $post - da li je post zahtev
         * @return type - trazeni html
         */
        public function getHtml($url, $post = null) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            if(!empty($post)) {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            } 
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        
        /**
         * Prikaz statistike za championa - poziva odgovarajuci view php i funckiju za ubacivanje u bazu
         * @param type $id - id heroja
         * @param type $role - uloga heroja u igri (top,jungle,mid,adc,support)
         * @return type - redirekt na potrebnu stranicu
         */
	public function champion($id, $role)
        {
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
                
                $buildModel = new BuildModel();
                
                $res = $buildModel->where('idchamp',$id);
                $res = $res->findAll();
                if (count($res)==0)
                {
                    BuildModel::get_info($data,$id);  
                }
                
                $res = $buildModel->where('idchamp',$id)->findAll();
		if (count($res)==0)
                {
                    if ($ses->get('user'))
                    {
                        return redirect()->to(site_url('Champions/'));
                    }
                    else
                    {
                         return redirect()->to(site_url('Champions/'));
                    }
                }
                $data = BuildModel::returnChampionData($res,$champion);
		echo view('pages/champion', $data);
                echo view('template/footer');
        }
        
        
        
        /**
         * Funckija koja radi pretragu po heroju i ide na odredjenu stranicu u zavisnosti od pretrage
         * @return type - redirkt na potrebu stranicu
         */
        public function searchChampion()
        {
            $ses = session();
            $championName = $this->request->getVar('champName');
            $model = new ChampionModel();
            $res = $model->like('name',$championName, "after");
            $res = $res->findAll();
            #var_dump($res);
            $ses = session();
            if (count($res)==0)
            {
                if ($ses->get('user'))
                {
                    return redirect()->to(site_url('Guest/'));
                }
                else
                {
                     return redirect()->to(site_url('LoggedUser/'));
                }
            }
            $min=70; $c=$res[0];
            foreach ($res as $champ)
            {
                $ime = $champ->name;
                if ($min>strlen($ime))
                {
                    $c=$champ;
                    $min=strlen($ime);
                }
            }
            //var_dump($c);
            if (!$ses->get('user'))
            {
                return redirect()->to(site_url("Guest/Champion/{$c->id}"));
            }
            else
            {
                return redirect()->to(site_url("LoggedUser/Champion/{$c->id}"));
            }
        }
        
        /**
         * Kontroler koji prikazuje statistike koje prikazuje odredjeni igrac
         * @param string $role - Rola koju ima trenutni korisnik
         */
        public function OverallStatistics($role)
        {   
            if ($role == "Guest")
			echo view('template/header.php');
            else 
            {
                echo view('template/header_loggedin', [
                        'role' => $this->session->get('user')->role,
                        'username' => $this->session->get('user')->summonerName
                ]);
            }
            $data = BuildModel::returnStatisticsData();
            echo view('pages/statistics', $data);
            echo view('template/footer');
        }
}
