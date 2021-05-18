<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\PlaysModel;
use App\Models\ChampionModel;
use App\Models\UserQuestModel;
use App\Models\QuestModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use App\Models\QuestAttributeModel;
use App\Models\GlobalModel;
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

        public function OverallStatistics($role="")
        {
            return parent::OverallStatistics("LoggedUser");
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
                    'id' => $userQuest->questId,
                    'title' => $quest->title,
                    'description' => $quest->description,
                    'image' => $quest->image,
                    'completed' => $userQuest->completed,
                    'attributes' => $this->getAttributes($quest->questId)
                ];
                //var_dump($dataQuest['attributes']);
                $preReq = false;
                $questRequired = null;
                foreach($dataQuest['attributes'] as $atr){
                    if($atr->attributeKey == 'Prerequisite Id'){
                        $questRequired = $atr->attributeValue;
                        $preReq = $atr->questId;
                        break;
                    }   
                }
                // quest has a prerequisite quest
                if($preReq != false){ 
                    // get the prerequisite quest and check if its completed by this user
                    $preReQuest = $uQModel->where('questId', $questRequired)->where('summonerName', $this->session->get('user')->summonerName)->find();
                    if($preReQuest[0]->completed == 0)
                        continue; 
                }
                
                 
                // $dataQuest['attributes'];
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

        $key = "RGAPI-15966e6c-4e1d-4880-827e-dffbacbe3836";

        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => $key,
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);


        $summoner = $api->getSummonerByName($summonerName);
        $url = "https://europe.api.riotgames.com/lol/match/v5/matches/by-puuid/" . $summoner->puuid . "/ids?start=0&count=20&api_key=" . $key;
        $matchlist = json_decode($this->getHtml($url));
        $data = [];
        $count = 0;
        $gameType = NULL;
        $gameMode = NULL;
        $ago = "";
        $summ1 = "";
        $summ2 = "";

        foreach ($matchlist as $match) {
            $url = "https://europe.api.riotgames.com/lol/match/v5/matches/" . $match . "?api_key=" . $key;
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
            else if ($matchO->info->queueId == 1020)
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

    private function divToColor($div) {
        if ($div == 'IRON')
            return '#606060';
        else if ($div == 'BRONZE')
            return '#a06020';
        else if ($div == 'SILVER')
            return '#a0a0a0';
        else if ($div == 'GOLD')
            return '#ffff00';
        else if ($div == 'PLATINUM')
            return '#808080';
        else if ($div == 'DIAMOND')
            return '#5050d0';
        return '#000000';
    }
    
    public static function StaticDivToColor($div) {
        if ($div == 'IRON')
            return '#606060';
        else if ($div == 'BRONZE')
            return '#a06020';
        else if ($div == 'SILVER')
            return '#a0a0a0';
        else if ($div == 'GOLD')
            return '#ffff00';
        else if ($div == 'PLATINUM')
            return '#808080';
        else if ($div == 'DIAMOND')
            return '#5050d0';
        return '#000000';
    }
    
    public function profile() {
        $summonerName = $this->session->get('user')->summonerName;
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $summonerName
        ]);
        echo view('pages/profile', [
            'matches' => $this->getMatchHistory($summonerName),
            'name' => $summonerName,
            'division' => $this->getDivision($summonerName),
            'champs' => $this->getMostPlayed($summonerName)
        ]);
        echo view('template/footer');
    }

    private function getDivision($summonerName) {
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => GlobalModel::getApiKey(),
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);
        $summoner = $api->getSummonerByName($summonerName);
        $divs = $api->getLeagueEntriesForSummoner($summoner->id);
        foreach ($divs as $div) {
            if ($div->queueType == 'RANKED_SOLO_5x5')
                return '<span style="color: '. $this->divToColor($div->tier) . '; font-size: 30px">' . $div->tier . ' ' . $div->rank . '</span>';
        }
        return '<span style="color: #000000; font-size: 30px"> UNRANKED </span>';
    }

    public function summoner($summonerName) {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/summoner', [
            'matches' => $this->getMatchHistory($summonerName),
            'name' => $summonerName,
            'division' => $this->getDivision($summonerName),
        ]);
        echo view('template/footer');
    }

    public function LiveGame()
    {
        DataDragonAPI::initByCDN();
            $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => 'RGAPI-1721c44e-ea77-4425-9a3a-55d598c0a3a3',
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
            ]);
        $apiKey = GlobalModel::getApiKey();
        //$userName = $this->session->get('user')->summonerName;
        
        
        
        $userName = "Braun%20Grzegorz"; //HARDCODED!!!!!!!!!!! PROMENI OVO
        
        
        
        $url = "https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/" . $userName . "?api_key=". $apiKey;
        $user = json_decode($this->getHtml($url));
        //var_dump($user);
        //var_dump($user);
        $userId = $user->id;
        $matchUrl = "https://eun1.api.riotgames.com/lol/spectator/v4/active-games/by-summoner/" . $userId . "?api_key=". $apiKey;
        //var_dump($this->getHtml($matchUrl));
        $match = json_decode($this->getHtml($matchUrl));
        //var_dump($match);
        if(property_exists($match, 'status')) {
            if($match->status->status_code == 404){
                echo view('template/header_loggedin', [
                'role' => $this->session->get('user')->role,
                'username' => $this->session->get('user')->summonerName
                ]);        
                //array_push($niz1, [ 'name' =>  ] )
                //echo view('pages/live_game', );
                //echo view('pages/profile', $this->getMatchHistory($summonerName));
                echo view('pages/no_live_game');
                echo view('template/footer');
                return ;
                }
        }
       
        //var_dump($match->participants[0]->summonerName);
        //var_dump($match);
        
        $leagueUrl="https://eun1.api.riotgames.com/lol/league/v4/entries/by-summoner/" . $userId . "?api_key=". $apiKey;
        $league = json_decode($this->getHtml($leagueUrl));
        
        //var_dump($leagueUrl);
        //var_dump($league->tier);
        //echo $match->participants[0]->summonerName;
        /*$players=[
                'summoner11' => ['name'=> $match->participants[0]->summonerName ],
                'summoner12' => ['name'=>'nest'],
            
                ];*/
        
        $dArray=[];
        $champArray=[];
        $spell1=[];
        $spell2=[];
        
        //$spellInfo= DataDragonAPI::getStaticSummonerSpellById();
        for ($i=0; $i<10; $i++)
        {
            $lUrl="https://eun1.api.riotgames.com/lol/league/v4/entries/by-summoner/" . $match->participants[$i]->summonerId . "?api_key=". $apiKey;
            $l=json_decode($this->getHtml($lUrl));
            
            //var_dump($l);
            //var_dump($l[0]->tier." ".$l[0]->rank);
            
            if($l==null || $l[0] == null || $l[0]->tier == ""){
                $tier = "UNRANKED";
                $rank = "";
            }
            else{
                $tier = $l[0]->tier;
                $rank = $l[0]->rank; 
            }
            array_push($dArray, $tier . " ". $rank);
            
            $magija1=$match->participants[$i]->spell1Id;
            $magija2=$match->participants[$i]->spell2Id;
            array_push($spell1, (DataDragonAPI::getStaticSummonerSpellById($magija1))["image"]["full"] );
            array_push($spell2, (DataDragonAPI::getStaticSummonerSpellById($magija2))["image"]["full"] );
            
            $champId=$match->participants[$i]->championId;
          
            
            $champion = $api->getStaticChampion($champId)->name;
            array_push($champArray, $champion);
            
            //var_dump($champion);
            
            
            echo "\n";
        }
        
        
        
        //echo dArray;
        //var_dump("\nOVDE\n");
        //var_dump($spell1[0]);
        $players=[
                'summoner11' => ['name' => $match->participants[0]->summonerName,  'div'=> $dArray[0],  'champ'=>$champArray[0], 'sp1'=>$spell1[0], 'sp2'=>$spell2[0]],
                'summoner12' => ['name' => $match->participants[1]->summonerName,  'div'=> $dArray[1],  'champ'=>$champArray[1], 'sp1'=>$spell1[1], 'sp2'=>$spell2[1]],
                'summoner13' => ['name' => $match->participants[2]->summonerName,  'div'=> $dArray[2],  'champ'=>$champArray[2], 'sp1'=>$spell1[2], 'sp2'=>$spell2[2]],
                'summoner14' => ['name' => $match->participants[3]->summonerName,  'div'=> $dArray[3],  'champ'=>$champArray[3], 'sp1'=>$spell1[3], 'sp2'=>$spell2[3]],
                'summoner15' => ['name' => $match->participants[4]->summonerName,  'div'=> $dArray[4],  'champ'=>$champArray[4], 'sp1'=>$spell1[4], 'sp2'=>$spell2[4]],
                'summoner21' => ['name' => $match->participants[5]->summonerName,  'div'=> $dArray[5],  'champ'=>$champArray[5], 'sp1'=>$spell1[5], 'sp2'=>$spell2[5]],
                'summoner22' => ['name' => $match->participants[6]->summonerName,  'div'=> $dArray[6],  'champ'=>$champArray[6], 'sp1'=>$spell1[6], 'sp2'=>$spell2[6]],
                'summoner23' => ['name' => $match->participants[7]->summonerName,  'div'=> $dArray[7],  'champ'=>$champArray[7], 'sp1'=>$spell1[7], 'sp2'=>$spell2[7]],
                'summoner24' => ['name' => $match->participants[8]->summonerName,  'div'=> $dArray[8],  'champ'=>$champArray[8], 'sp1'=>$spell1[8], 'sp2'=>$spell2[8]],
                'summoner25' => ['name' => $match->participants[9]->summonerName,  'div'=> $dArray[9],  'champ'=>$champArray[9], 'sp1'=>$spell1[9], 'sp2'=>$spell2[9]]
                ];
        
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        
        
        //array_push($niz1, [ 'name' =>  ] )
        //echo view('pages/live_game', );
        //echo view('pages/profile', $this->getMatchHistory($summonerName));
        echo view('pages/live_game', ['names'=>$players]);
        echo view('template/footer');
    }

    private function getMatchHistory($summonerName) {
        DataDragonAPI::initByCDN();
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => GlobalModel::getApiKey(),
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
            if (++$count == 10)
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
        return $data;
	}

    private function getMostPlayed($summonerName) {
        DataDragonAPI::initByCDN();
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => 'RGAPI-15966e6c-4e1d-4880-827e-dffbacbe3836',
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);

        $model = new KorisnikModel();
        $summoner = $model->find($summonerName);
        if ($summoner->lastGamePlayed == NULL) {
            $summoner->lastGamePlayed = 0;
        }
        $matchlist = $api->getMatchListByAccount($api->getSummonerByName($summonerName)->accountId)->matches;

        $modelChamp = new ChampionModel();
        $allChamps = $modelChamp->findAll();
        $modelPlays = new PlaysModel();
        $plays = [];

        /*
        $modelPlays->insert([
            'summonerName' => $summonerName,
            'idChamp' => 123,
            'games_won' => 0,
            'games_played' => 0
        ]);
        */

        foreach ($allChamps as $champ) {
            $plays[$champ->id] = $modelPlays->where('summonername', $summonerName)->where('idchamp', $champ->id)->findAll();
            if (sizeof($plays[$champ->id]) == 0)
                $plays[$champ->id] = NULL;
            else
                $plays[$champ->id] = $plays[$champ->id][0];
        }

        var_dump($plays);

        $limit = 0;
        for($i = 99; $i >= 0; --$i) {
            $match = $matchlist[$i];
            if($match->timestamp < $summoner->lastGamePlayed)
                continue;
            if($match->queue == 420) {
                if (++$limit > 50)
                    break;
                if ($plays[(int) $match->champion] == NULL) {
                    $plays[(int) $match->champion] = (object) [
                        'summonername' => $summonerName,
                        'idchamp' => (int) $match->champion,
                        'games_won' => 0,
                        'games_played' => 0
                    ];
                    /*
                    $plays[(int) $match->champion]->summonerName = $summonerName;
                    $plays[(int) $match->champion]->idChamp = (int) $match->champion;
                    $plays[(int) $match->champion]->games_won = 0;
                    $plays[(int) $match->champion]->games_played = 0;
                    */
                }
                $plays[(int) $match->champion]->games_played += 1;
                $matchO = $api->getMatch($match->gameId);
                for ($j = 0; $j < 10; ++$j) {
                    if ($matchO->participantIdentities[$matchO->participants[$j]->participantId - 1]->player->summonerName == $summonerName)
                        $team = $matchO->participants[$j]->teamId;
                }
                if (($matchO->teams[0]->teamId == $team && $matchO->teams[0]->win == 'Win') || ($matchO->teams[1]->teamId == $team && $matchO->teams[1]->win == 'Win'))
                    ++$plays[(int) $match->champion]->games_won;
                // var_dump($match);
                $summoner->lastGamePlayed = $matchlist[$i]->timestamp;
                $model->save($summoner);
                $modelPlays->save($plays[(int) $match->champion]);
            }
        }

        /*
        $summoner->lastGamePlayed = $matchlist[0]->timestamp;
        $korisnikModel.save($summoner);
        var_dump($plays);
        foreach ($plays as $play) {
            if ($play != NULL)
                $playsModel->save($play);
        }
        */

        $champ = [];
        $games = [];
        for ($i = 0; $i < 3; ++$i) {
            array_push($champ, array_search(max($count),$count));
            if ($count[$champ[$i]] == 0)
                return [];
            array_push($games, $count[$champ[$i]]);
            $count[$champ[$i]] = 0;
        }
        $wins = [];
        for ($i = 0; $i < 3; ++$i) {
            array_push($wins, 0);
            foreach ($matches[$champ[$i]] as $match) {
                $matchO = $api->getMatch($match);
                for ($j = 0; $j < 10; ++$j) {
                    if ($matchO->participantIdentities[$matchO->participants[$j]->participantId - 1]->player->summonerName == $summonerName)
                        $team = $matchO->participants[$j]->teamId;
                }
                if (($matchO->teams[0]->teamId == $team && $matchO->teams[0]->win == 'Win') || ($matchO->teams[1]->teamId == $team && $matchO->teams[1]->win == 'Win'))
                    $wins[$i]++;
            }
        }

        $splash = [];
        for ($i = 0; $i < 3; ++$i) {
            $champ[$i] = $api->getStaticChampion($champ[$i])->name;
            // echo DataDragonAPI::getChampionSplashUrl($champ[$i]);
            array_push($splash, DataDragonAPI::getChampionSplashUrl($champ[$i]));
        }
        return ['champ'     =>  $champ,
                'splash'    =>  $splash,
                'games'     =>  $games,
                'wins'      =>  $wins
        ];
    }

    public function questProgress($summonerName = "GINDRA"){
        $lastGamePlayedts = (new KorisnikModel())->find($summonerName)->lastGamePlayed;
        
        $currTime = time();
        
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        
        DataDragonAPI::initByCDN();
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    =>  GlobalModel::getApiKey(),
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);

        $summoner = $api->getSummonerByName($summonerName);
        $matchlist = $api->getMatchListByAccount($summoner->accountId)->matches;
        $count = 0;
        foreach ($matchlist as $match) {
            if (++$count == 10)
                break;
            $matchO = $api->getMatch($match->gameId);
            $game_ts = $matchO->gameCreation;
            $players = [];
            var_dump($game_ts);
            // var_dump($matchO);
            // break;
            for ($i = 0; $i < 10; ++$i) {
                if($matchO->participantIdentities[$matchO->participants[$i]->participantId - 1]->player->summonerName != $summonerName)
                    continue;
                array_push($players, [
                    'summonerName' => $matchO->participantIdentities[$matchO->participants[$i]->participantId - 1]->player->summonerName,
                    'champion' => $api->getStaticChampion($matchO->participants[$i]->championId)->name,
                ]);
                if ($matchO->participantIdentities[$matchO->participants[$i]->participantId - 1]->player->summonerName == $summonerName) {
                    $part = $matchO->participants[$i];
                    $stats = $part->stats;
                    
                    $stats->championName = $api->getStaticChampion($matchO->participants[$i]->championId)->name;
                    var_dump($stats);
                    
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
        
        //var_dump($lastGamePlayedts . " ");
        //var_dump($currTime);
        echo view('template/footer');
    }
}
