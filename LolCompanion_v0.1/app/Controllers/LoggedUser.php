<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\UserQuestModel;
use App\Models\QuestModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;

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
        
        public function challenges() {
            echo view('template/header_loggedin', [
				'role' => $this->session->get('user')->role,
				'username' => $this->session->get('user')->summonerName
			]);
            echo view('pages/challenges', $this->getChallenges());
            echo view('template/footer');
        }
        
        public function getChallenges(){
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
                    'completed' => $userQuest->completed
                ];
                array_push($data['quests'], $dataQuest);
            }
            return $data;
        }

    private function getHtml($url, $post = null) {
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

	private function getMatchHistory($summonerName) {

        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => 'RGAPI-752c2347-c8ee-4453-bbb8-cb25336bfd1d',
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);

        $summoner = $api->getSummonerByName($summonerName);
        $matchlist = $api->getMatchlistByAccount($summoner->accountId);
        $data = [];
        $count = 0;
        foreach ($matchlist as $match) {
            $url = "https://europe.api.riotgames.com/lol/match/v5/matches/EUN1_" . $match->gameId . "?api_key=RGAPI-752c2347-c8ee-4453-bbb8-cb25336bfd1d";
            $matchO = json_decode($this->getHtml($url));
            $players = [];
            $items = [];
            $champion = "";
            $summ1 = "";
            $summ2 = "";
            for ($i = 0; $i < 10; ++$i) {
                array_push($players, [
                    'summonerName' => $matchO->info->participants[$i]->summonerName,
                    'champion' => $matchO->info->participants[$i]->championName,
                ]);

                if ($matchO->info->participants[$i]->summonerName == $summonerName) {
                    $ja = $matchO->info->participants[$i];
                    $items = [
                    'item0' => $ja->item0,
                    'item1' => $ja->item1,
                    'item2' => $ja->item2,
                    'item3' => $ja->item3,
                    'item4' => $ja->item4,
                    'item5' => $ja->item5,
                    'item6' => $ja->item6,
                    ];
                    $champion = $ja->championName;
                    $summ1 = $ja->summoner1Id;
                    $summ2 = $ja->summoner2Id;
                }
                // var_dump($players);
                // var_dump($matchO);
                // echo "\n";
            }
            if (++$count == 10)
                break;
            array_push($data, [
                'players' => $players,
                'items' => $items,
                'champion' => $champion,
                'summ1' => $summ1,
                'summ2' => $summ2
            ]);
        }
        return ['matches' => $data];
	}

    public function profile() {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/profile', $this->getMatchHistory($this->session->get('user')->summonerName));
        echo view('template/footer');
    }

}
