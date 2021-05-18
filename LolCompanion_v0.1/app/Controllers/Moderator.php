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
use App\Models\UserQuestModel;

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
                'id' => $quest->questId,
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
        
        $options =  json_decode($_POST['hiddenOptions']);
        
        
        
        $qModel = new QuestModel();
        $qattrModel = new QuestAttributeModel();
        $uQModel = new UserQuestModel();
        
        $quest = [
            'description' => $_POST['description'],
            'title' => $_POST['title'],
            'image' => $_POST['imgurl']
        ];
        
        $qModel->insert($quest);
        $lastid = $qModel->getInsertID();
        
        $users = (new KorisnikModel())->findAll();
        foreach($users as $user){
            $userQ = [
                'summonerName' => $user->summonerName,
                'questId' => $lastid,
                'completed' => 0
            ];
            $uQModel->insert($userQ);
        }
        
        if($options != null){
            foreach ($options as $option){
            $attribute = [
                'questId' => $lastid,
                'attributeKey' => $option->key,
                'attributeValue' => $option->val
            ];
            $qattrModel->insert($attribute);
            }
        }
        
        
        return $this->addQuest("Res: " . $_POST['title'] . $_POST['description']. $_POST['imgurl']. $_POST['champion']. $_POST['role'] . $_POST['hiddenOptions']);
             
    }
    
    public function deleteQuest(){
        var_dump($_POST['questId']);
        $qModel = new QuestModel();
        
        
        $uqModel = new UserQuestModel();
        $uqModel->where('questId', $_POST['questId'])->delete();
        $attrModel = new QuestAttributeModel();
        $attrModel->where('questId', $_POST['questId'])->delete();
        
        $qModel->delete($_POST['questId']);
        return redirect()->to(site_url('Moderator/allChallenges'));
    }
}


