<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\UserQuestModel;
use App\Models\QuestModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use App\Models\QuestAttributeModel;
use RiotAPI\DataDragonAPI\DataDragonAPI;

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

        protected function getAttributes($idQ) {
            $qAttrModel = new QuestAttributeModel();
            $attributes = $qAttrModel->where('questId', $idQ)->findAll();
            return $attributes;
        }
    

	private function getMatchHistoryV5($summonerName) {
            DataDragonAPI::initByCDN();
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => 'RGAPI-1721c44e-ea77-4425-9a3a-55d598c0a3a3',
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);


        $summoner = $api->getSummonerByName($summonerName);
        $url = "https://europe.api.riotgames.com/lol/match/v5/matches/by-puuid/" . $summoner->puuid . "/ids?start=0&count=20&api_key=RGAPI-1721c44e-ea77-4425-9a3a-55d598c0a3a3";
        $matchlist = json_decode($this->getHtml($url));
        $data = [];
        $count = 0;
        $gameType = NULL;
        $gameMode = NULL;
        $ago = "";
        $summ1 = "";
        $summ2 = "";

        foreach ($matchlist as $match) {
            $url = "https://europe.api.riotgames.com/lol/match/v5/matches/" . $match . "?api_key=RGAPI-1721c44e-ea77-4425-9a3a-55d598c0a3a3";
            $matchO = json_decode($this->getHtml($url));
            if (!property_exists($matchO, 'info')) continue;
            $ago = (time() - ($matchO->info->gameDuration + $matchO->info->gameStartTimestamp) / 1000) / 60;
            if ($ago < 60)
                $ago_str = number_format($ago, 0) . " min";
            else if ($ago < 60 * 24)
                $ago_str = number_format($ago / 60, 0) . " h";
            else $ago_str = number_format($ago / 60 / 24, 0) . " d";
            $players = [];
            // var_dump($matchO);
            // break;
            for ($i = 0; $i < 10; ++$i) {
                array_push($players, [
                    'summonerName' => $matchO->info->participants[$i]->summonerName,
                    'champion' => $matchO->info->participants[$i]->championName,
                ]);

                if ($matchO->info->participants[$i]->summonerName == $summonerName) {
                    $stats = $matchO->info->participants[$i];
                    if ((int) $stats->summoner1Id > 15) {
                        $summ1 = 15;
                        continue;
                    }
                    $summ1 = $api->getStaticSummonerSpell($stats->summoner1Id)->image->full;
                    $summ2 = $api->getStaticSummonerSpell($stats->summoner2Id)->image->full;
                    if ($stats->item0 == 0) $stats->item0 = base_url("/slike/empty.png");
                    else $stats->item0 = DataDragonAPI::getItemIconUrl($stats->item0);
                    if ($stats->item1 == 0) $stats->item1 = base_url("/slike/empty.png");
                    else $stats->item1 = DataDragonAPI::getItemIconUrl($stats->item1);
                    if ($stats->item2 == 0) $stats->item2 = base_url("/slike/empty.png");
                    else $stats->item2 = DataDragonAPI::getItemIconUrl($stats->item2);
                    if ($stats->item3 == 0) $stats->item3 = base_url("/slike/empty.png");
                    else $stats->item3 = DataDragonAPI::getItemIconUrl($stats->item3);
                    if ($stats->item4 == 0) $stats->item4 = base_url("/slike/empty.png");
                    else $stats->item4 = DataDragonAPI::getItemIconUrl($stats->item4);
                    if ($stats->item5 == 0) $stats->item5 = base_url("/slike/empty.png");
                    else $stats->item5 = DataDragonAPI::getItemIconUrl($stats->item5);
                }
            }
            if ($summ1 == 15)
                continue;
            if (!property_exists($matchO, 'info')) continue;
            if ($matchO->info->queueId == 400)
                $matchO->info->gameMode = "DRAFT";
            else if ($matchO->info->queueId == 420)
                $matchO->info->gameMode = "RANKED";
            else if ($matchO->info->queueId == 430)
                $matchO->info->gameMode = "BLIND";
            else if ($matchO->info->queueId == 440)
                $matchO->info->gameMode = "FLEX";
            else if ($matchO->info->queueId == 450)
                $matchO->info->gameMode = "ARAM";
            else if ($matchO->info->queueId == 700)
                $matchO->info->gameMode = "CLASH";
            else if ($matchO->queueId == 1020)
                $matchO->info->gameMode = "ONE FOR ALL";
            array_push($data, [
                'players' => $players,
                'stats' => $stats,
                'info' => $matchO->info,
                'ago' => $ago_str,
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
        echo view('pages/profile', $this->getMatchHistoryV5($this->session->get('user')->summonerName));
        echo view('template/footer');
    }

    public function summoner($summonerName) {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/profile', $this->getMatchHistoryV5($summonerName));
        echo view('template/footer');
    }

    public function getLiveGame($userName)
    {
        $url = "https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/" . $userName . "?api_key=RGAPI-1721c44e-ea77-4425-9a3a-55d598c0a3a3";
        $user = json_decode($this->getHtml($url));
        $userId = $user->id;
        $matchUrl = "https://eun1.api.riotgames.com/lol/spectator/v4/active-games/by-summoner/" . $userId . "?api_key=RGAPI-1721c44e-ea77-4425-9a3a-55d598c0a3a3";
        $match = json_decode($this->getHtml($matchUrl));
        var_dump($match);
    }

	private function getMatchHistory($summonerName) {
            DataDragonAPI::initByCDN();
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => 'RGAPI-1721c44e-ea77-4425-9a3a-55d598c0a3a3',
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);

        $summoner = $api->getSummonerByName($summonerName);
        $matchlist = $api->getMatchListByAccount($summoner->accountId)->matches;
        $data = [];
        $count = 0;
        $gameType = NULL;
        $gameMode = NULL;
        $ago = "";
        $summ1 = "";
        $summ2 = "";

        $count = 0;
        foreach ($matchlist as $match) {
            if ($count % 20 == 19)
                sleep(1);
            if (++$count > 90)
                break;
            $matchO = $api->getMatch($match->gameId);
            $ago = (time() - ($matchO->gameDuration + $matchO->gameCreation) / 1000) / 60;
            if ($ago < 60)
                $ago_str = number_format($ago, 0) . " min";
            else if ($ago < 60 * 24)
                $ago_str = number_format($ago / 60, 0) . " h";
            else $ago_str = number_format($ago / 60 / 24, 0) . " d";
            $players = [];
            // var_dump($matchO);
            // break;
            for ($i = 0; $i < 10; ++$i) {
                array_push($players, [
                    'summonerName' => $matchO->participantIdentities[$matchO->participants[$i]->participantId - 1]->player->summonerName,
                    'champion' => $api->getStaticChampion($matchO->participants[$i]->championId)->name,
                ]);
                if ($matchO->participantIdentities[$matchO->participants[$i]->participantId - 1]->player->summonerName == $summonerName) {
                    $part = $matchO->participants[$i];
                    $stats = $part->stats;
                    $stats->championName = $api->getStaticChampion($matchO->participants[$i]->championId)->name;
                    $summ1 = $api->getStaticSummonerSpell($part->spell1Id)->image->full;
                    $summ2 = $api->getStaticSummonerSpell($part->spell2Id)->image->full;
                    if ($stats->item0 == 0) $stats->item0 = base_url("/slike/empty.png");
                    else $stats->item0 = DataDragonAPI::getItemIconUrl($stats->item0);
                    if ($stats->item1 == 0) $stats->item1 = base_url("/slike/empty.png");
                    else $stats->item1 = DataDragonAPI::getItemIconUrl($stats->item1);
                    if ($stats->item2 == 0) $stats->item2 = base_url("/slike/empty.png");
                    else $stats->item2 = DataDragonAPI::getItemIconUrl($stats->item2);
                    if ($stats->item3 == 0) $stats->item3 = base_url("/slike/empty.png");
                    else $stats->item3 = DataDragonAPI::getItemIconUrl($stats->item3);
                    if ($stats->item4 == 0) $stats->item4 = base_url("/slike/empty.png");
                    else $stats->item4 = DataDragonAPI::getItemIconUrl($stats->item4);
                    if ($stats->item5 == 0) $stats->item5 = base_url("/slike/empty.png");
                    else $stats->item5 = DataDragonAPI::getItemIconUrl($stats->item5);
                }
            }
            $type = "";
            if ($matchO->queueId == 400)
                $type = "DRAFT";
            else if ($matchO->queueId == 420)
                $type = "RANKED";
            else if ($matchO->queueId == 430)
                $type = "BLIND";
            else if ($matchO->queueId == 440)
                $type = "FLEX";
            else if ($matchO->queueId == 450)
                $type = "ARAM";
            else if ($matchO->queueId == 700)
                $type = "CLASH";
            else if ($matchO->queueId == 1020)
                $type = "ONE FOR ALL";
            else $type = (string) $matchO->queueId;
            $info = json_decode('{ "gameMode":"'. $type . '"}');
            $info = new \stdClass;
            $info->gameMode = $type;
            $info->gameDuration = $matchO->gameDuration * 1000;
            array_push($data, [
                'players' => $players,
                'stats' => $stats,
                'ago' => $ago_str,
                'summ1' => $summ1,
                'summ2' => $summ2,
                'info' => $info
            ]);
        }
        return ['matches' => $data];
	}
}
