<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\UserQuestModel;
use App\Models\QuestModel;
use App\Models\QuestAttributeModel;

class LoggedUser extends BaseController
{
	public function index()
	{
        $data = [];
        $data['Controller']='LoggedUser';
        $data['role'] = $this->session->get('user')->role;
        $data['username'] = $this->session->get('user')->summonerName;
        echo view('template/header_loggedin',$data);
        echo view('pages/index');
        echo view('template/footer');
	}

    public function changePassword($msg = '')
    {
        $data = [];
        $data['Controller']='LoggedUser';
        $data['role'] = $this->session->get('user')->role;
        $data['username'] = $this->session->get('user')->summonerName;
        $data['msg'] = $msg;
        echo view('template/header_loggedin',$data);
        echo view('pages/changePassword', ['msg' => $msg]);
        echo view('template/footer');
    }

    public function changePasswordSubmit() {
        if(!$this->validate(['curpass'=>'required', 'newpass1'=>'required', 'newpass2'=>'required'])){
            return $this->changePassword('Please fill in all the required fields!');
        }
        $korisnikModel=new KorisnikModel();
        $user=$this->session->get('user');

        if($this->request->getVar('curpass') != $user->password) {
            return $this->changePassword('Wrong password');
        }

        if($this->request->getVar('newpass1') != $this->request->getVar('newpass2')) {
            return $this->changePassword('Passwords do not match');
        }   
        $user->password = $this->request->getVar('newpass1');
        $korisnikModel->update($user->summonerName, $user);
        return $this->index();
    }

    public function logout() {
        $this->session->remove('user');
        return redirect()->to(site_url('Guest'));
    }

	public function champions($role = "")
	{
		return parent::champions("LoggedUser");
	}

	public function champion($id, $role = "")
	{
		return parent::champion($id, "LoggedUser");
	}
        
        public function challenges(){
            echo view('template/header_loggedin', [
				'role' => $this->session->get('user')->role,
				'username' => $this->session->get('user')->summonerName
			]);
            echo view('pages/challenges', $this->getChallenges());
            echo view('template/footer');
        }
        
       private function getChallenges(){
            $uQModel = new UserQuestModel();
            $qModel = new QuestModel();
            $uQ = $uQModel->where('summonerName', $this->session->get('user')->summonerName)->findAll();
            $poroUser = count($uQModel->where('summonerName', $this->session->get('user')->summonerName)->where('completed', 1)->findAll());
            $poroTotal = count($qModel->findAll());


            $data = [
                'poroUser' => $poroUser,
                'poroTotal' => $poroTotal,
                'quests' => []
            ];
            
            foreach ($uQ as $userQuest) {
                $quest = $qModel->find($userQuest->questId);
                $dataQuest = [
                    'title' => $quest->title,
                    'description' => $quest->description,
                    'image' => $quest->image,
                    'completed' => $userQuest->completed,
                    'attributes' => $this->getAttributes($quest->questId)
                ];
                array_push($data['quests'], $dataQuest);
            }
            return $data;
        }
        
        protected function getAttributes($idQ){
            $qAttrModel = new QuestAttributeModel();
            $attributes = $qAttrModel->where('questId', $idQ)->findAll();
            return $attributes;
        }
    /*
	public function champion($id, $role = "") {

        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => 'RGAPI-24b0644f-6f97-483d-99d0-ed2e9322be96',
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);

        $api->
        $summoner = $api->getSummonerByName("Gindra");
        $matchlist = $api->getMatchlistByAccount($summoner->accountId);
        foreach ($matchlist as $match) {
            var_dump($match);
            echo "\n";
        }
	}
    */
}
