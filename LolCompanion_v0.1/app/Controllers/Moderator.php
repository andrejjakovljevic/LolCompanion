<?php

namespace App\Controllers;

require_once __DIR__  . "../../../vendor/autoload.php";


use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use App\Models\ChampionModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use voku\helper\HtmlDomParser;
use RiotAPI\DataDragonAPI\DataDragonAPI;
use JonnyW\PhantomJs\Client;
use App\Models\QuestModel;
use App\Models\QuestAttributeModel;


class Moderator extends LoggedUser {

    public function index($msg = "") {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/admin', ['msg' => $msg]);
        echo view('template/footer');
    }
    
    public function allChallenges(){
        echo view('template/header_loggedin', [
				'role' => $this->session->get('user')->role,
				'username' => $this->session->get('user')->summonerName
			]);
        echo view('pages/challenges_mod', $this->getAllChallenges());
        echo view('template/footer');
    }
    
    private function getAllChallenges(){
        $qModel = new QuestModel();
        $Quests = $qModel->findAll();
        
        $data = [
            'quests' => []
        ];

        foreach ($Quests as $quest) {
            $dataQuest = [
                'title' => $quest->title,
                'description' => $quest->description,
                'image' => $quest->image,
                'attributes' => $this->getAttributes($quest->questId)
            ];
            array_push($data['quests'], $dataQuest);
        }
        return $data;
    }
    
    public function addQuest($msg=""){
        echo view('template/header_loggedin', [
				'role' => $this->session->get('user')->role,
				'username' => $this->session->get('user')->summonerName
			]);
        echo view('pages/add_challenge', ['msg' => $msg]);
        echo view('template/footer');
    }
    
    public function addQuestAttribute(){
        var_dump($this->validate(['option' => 'required']));
        
        return $this->addQuest("Ae mrs");
    }
    
    public function addQuestSubmit(){
        if(!$this->validate(['title' => 'required']) || !$this->validate(['description' => 'required']) ){
            return $this->addQuest('One or more empty fields');
        }
        
        return $this->addQuest("Res: " . $_POST['title'] . $_POST['description']. $_POST['imgurl']);
             
    }
}


