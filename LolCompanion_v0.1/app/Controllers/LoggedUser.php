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

/**
 * Autori:  Aleksandar Maksimovic   ma180016
 *          Andrej Jakovljevic      ja180039
 *          Dragan Milovancevic     md180153
 *          Veljko Rvovic           rv180132
 * Klasa LoggedUser sadrzi funkcije za prikaz i pomocne funkije koje one pozivaju
 * vezane za registovanog korisnika
 * @version 1.0
 */
class LoggedUser extends BaseController
{
    /**
     * Autor: Dragan Milovancevic md180153
     * Funkcija kreira stranicu sa funkcijom pretrage heroja
     */
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

    /**
     * Autor: Andrej Jakovljevic ja180039
     * Funkcija kreira stranicu sa funkcijom promene sifre
     * @param msg Poruka korisniku o uspesnosti promene sifre
     */
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

    /**
     * Autor: Andrej Jakovljevic ja180039
     * Funkcija obavlja promenu sifre i obavestavanje korisnika
     * @return void
     */
    public function changePasswordSubmit() {
        if(!$this->validate(['curpass'=>'required', 'newpass1'=>'required', 'newpass2'=>'required'])){
            return $this->changePassword('Please fill in all the required fields!');
        }
        $korisnikModel=new KorisnikModel();
        $user=$this->session->get('user');

        $hes=hash("sha256",$this->request->getVar('curpass'),false);
        $pas=$user->password;
        $nes=strcmp($hes, $pas);
        if ($hes!=$pas)
        {
            return $this->changePassword("Wrong password");
        }

        if($this->request->getVar('newpass1') != $this->request->getVar('newpass2')) {
            return $this->changePassword('Passwords do not match');
        }   
        $user->password = hash("sha256",$this->request->getVar('newpass1'),false);
        $korisnikModel->update($user->summonerName, $user);
        return $this->index();
    }

    /**
     * Autor: Dragan Milovancevic md180153
     * Funkcija za izlogovanje korisnika
     * @return void
     */
    public function logout() {
        $this->session->remove('user');
        return redirect()->to(site_url('Guest'));
    }

    /**
     * Autor: Andrej Jakovljevic ja180039
     * Funkcija poziva odgovarajucu funkciju iz BaseContorller-a
     * @param string role Uloga trenutnog korisnika
     */
	public function champions($role = "")
	{
            return parent::champions("LoggedUser");
	}

    /**
     * Autor: Andrej Jakovljevic ja180039
     * Funkcija poziva odgovarajucu funkciju iz BaseContorller-a
     * @param string role Uloga trenutnog korisnika
     */
    public function OverallStatistics($role="")
    {
        return parent::OverallStatistics("LoggedUser");
    }
        
    /**
     * Autor: Andrej Jakovljevic ja180039
     * Funkcija poziva odgovarajucu funkciju iz BaseContorller-a
     * @param int id id heroja 
     * @param string role uloga trenutnog korisnika
     * @return void
     */
	public function champion($id, $role = "")
	{
		return parent::champion($id, "LoggedUser");
	}
        
    /**
     * Autor: Veljko Rvovic rv180132
     * Funckija kreira stranicu za prikazivanje izazova
     */
    public function challenges() {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/challenges', QuestModel::getChallenges($this->session));
        echo view('template/footer');
    }

    /**
     * Autor: Dragan Milovancevic
     * Pomocna funkcija za dohvatanje broja osvojenih i maksimalnih poroa
     * @param string summonerName Korisnicko ime
     * @return object
     */
    private function getPoros($summonerName) {
            $uQModel = new UserQuestModel();
            $qModel = new QuestModel();
            $poroUser = count($uQModel->where('summonerName', $this->session->get('user')->summonerName)->where('completed', 1)->findAll());
            $poroTotal = count($qModel->findAll());

            return (object) [ 'poroUser' => $poroUser, 'poroTotal' => $poroTotal ];
    }

    /**
     * Autor: Dragan Milovancevic md180153
     * Funckija za dohvatanje istorije igara za zadatog korisnika koristeci v5 match api
     * trenutno se ne koristi
     * @param string summonerName Korisnicko ime
     * @return array
     */
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
        var_dump("OVDE SAM");
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

    /**
     * Autor: Dragan Milovancevic md180153
     * Pomocna funkcija za odredjivanje boje na osnovu divizije
     * @param string div Divizija
     * @return string
     */
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
    
    /**
     * Autor: Veljko Rvovic rv180132
     * Staticka pomocna funkcija za odredjivanje boje na osnovu divizije
     * @param string div Divizija
     * @return string
     */
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
            return '#58C9B9';
        else if ($div == 'DIAMOND')
            return '#5050d0';
        return '#000000';
    }
    
    /**
     * Autor: Dragan Milovancevic md180153
     * Funkcija za prikaz profilne stranice korisnika
     */
    public function profile() {
        $summonerName = $this->session->get('user')->summonerName;
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $summonerName
        ]);
        echo view('pages/profile', [
            'matches' => KorisnikModel::getMatchHistory($summonerName),
            'name' => $summonerName,
            'division' => $this->getDivision($summonerName),
            'champs' => PlaysModel::getMostPlayed($summonerName),
            'poros' => $this->getPoros($summonerName)
        ]);
        echo view('template/footer');
    }

    /**
     * Autor: Dragan Milovancevic md180153
     * Funkija koja odredjuje diviziju zadatog korisnika
     * @param string summonerName Korisnicko ime
     * @return string dom element
     */
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

    /**
     * Autor: Dragan Milovancevic md180153
     * Funkija za prikaz stranice neregistrovanog korisnika
     * @param string summonerName Korisnicko ime
     */
    public function summoner($summonerName) {
        echo view('template/header_loggedin', [
            'role' => $this->session->get('user')->role,
            'username' => $this->session->get('user')->summonerName
        ]);
        echo view('pages/summoner', [
            'matches' => KorisnikModel::getMatchHistory($summonerName),
            'name' => $summonerName,
            'division' => $this->getDivision($summonerName),
        ]);
        echo view('template/footer');
    }
    
    
    
    
    
    /**
     * Autor: Aleksandar Maksimovic ma180016
     * Funkija za izracunavanje statistke igraca u skorijoj proslosti.
     */
    public function calculatingWinRatesV2($match)
    {
        DataDragonAPI::initByCDN();
            $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => GlobalModel::getApiKey(),
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
            ]);
        $apiKey = GlobalModel::getApiKey();
        
        $winRateArray=[];
        $arA=[];
        $arK=[];
        $arD=[];
        
        for ($i=0; $i<10; $i++)
        {
            //var_dump($i."BROJ");
            $champId=$match->participants[$i]->championId;
            $ime=$match->participants[$i]->summonerName;
            $summoner = $api->getSummonerByName($ime);
            $matchlist = $api->getMatchListByAccount($summoner->accountId, null, null, $champId, null, null, null, null)->matches;
            
            //var_dump(count($matchlist)." ". $ime);
            $numTotal=0;
            $numWon=0;
            
            $kills=0;
            $deaths=0;
            $assists=0;
            
            $it=0;
            $par = $match->participants[$i];
            $idIgrac=$match->participants[$i]->summonerId;
            for($k=0; $k<count($matchlist); $k++)
            {
                $iMatch = $matchlist[$k];
                //var_dump($iMatch->timestamp);
                
                $it++;
                if ($it==4) break;
                $iChamp=$iMatch->champion;
                
                if ($iChamp==$champId)
                {
                   $numTotal++;
                   $matchUrl = "https://eun1.api.riotgames.com/lol/match/v4/matches/" . $iMatch->gameId . "?api_key=". $apiKey;
                   $mec = json_decode($this->getHtml($matchUrl));
                   
                   $tim1=$mec->teams[0];
                   $tim2=$mec->teams[1];
                   
                   foreach ($mec->participantIdentities as $ig)
                   {
                       if ($ig->player->summonerId!=$idIgrac) continue;
                       //$igrac=$mec->participants[$ig->participantId];
                       $igrac=null;
                       for ($j=0; $j<10; $j++)
                            if ($mec->participants[$j]->participantId==$ig->participantId)
                            {
                                $igrac=$mec->participants[$j];
                                break;
                            }
                            
                       $kills+=$igrac->stats->kills;
                       $assists+=$igrac->stats->assists;
                       $deaths+=$igrac->stats->deaths;
                       
                       $tim=$igrac->teamId;
                       
                       if ($tim==$tim1->teamId)
                       {    
                           if ($tim1->win=="Win")
                               $numWon++;
                          
                       }
                       else
                       {
                           if ($tim2->win=="Win")
                               $numWon++;
                       }
                   }
                }
                
            }
            //var_dump($numWon . " - " . $numTotal);
            //echo $ime." ".$numTotal.":".$numWon."\n";
            if ($numTotal>0)
            {
                $wr=(int) (100.*($numWon/$numTotal));
                $wr="$wr%";
            }
            else 
                $wr="None";
            
            
            array_push($arK, $kills);
            array_push($arA, $assists);
            array_push($arD, $deaths);
            
            array_push($winRateArray, $wr);
        }
        //var_dump($winRateArray);
        $rez=["wr"=>$winRateArray, "k"=>$arK, "a"=>$arA, "d"=>$arD];
        
        return $rez;
        
    }
    
    
   
    
    
    /**
     * Autor: Aleksandar Maksimovic ma180016
     * Funkija za prikaz stranice o trenutnoj igri korisnika
     */
    public function LiveGame($userName)
    {
        DataDragonAPI::initByCDN();
            $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => GlobalModel::getApiKey(),
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
            ]);
        $apiKey = GlobalModel::getApiKey();
        //$userName = $this->session->get('user')->summonerName;
        //$userName = str_replace(" ", "%20", $userName);
        
        $url = "https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/" . $userName . "?api_key=". $apiKey;
        $user = json_decode($this->getHtml($url));
        $userId = $user->id;
        $matchUrl = "https://eun1.api.riotgames.com/lol/spectator/v4/active-games/by-summoner/" . $userId . "?api_key=". $apiKey;
        
        $match = json_decode($this->getHtml($matchUrl));
        
        if(property_exists($match, 'status')) {
            if($match->status->status_code == 404){
                echo view('template/header_loggedin', [
                'role' => $this->session->get('user')->role,
                'username' => $this->session->get('user')->summonerName
                ]);        
                //echo view('pages/live_game', );
                //echo view('pages/profile', $this->getMatchHistory($summonerName));
                echo view('pages/no_live_game');
                echo view('template/footer');
                return ;
                }
        }
        
        $leagueUrl="https://eun1.api.riotgames.com/lol/league/v4/entries/by-summoner/" . $userId . "?api_key=". $apiKey;
        $league = json_decode($this->getHtml($leagueUrl));
        
        $dArray=[];
        $champArray=[];
        $spell1=[];
        $spell2=[];
        $winRateArray=[];
       
        $summoner = $api->getSummonerByName($userName);
        $matchlist = $api->getMatchListByAccount($summoner->accountId)->matches;
        
        //var_dump(count($matchlist)." neeesto");
        //var_dump($matchlist[0]);
        
        
      
        
        for ($i=0; $i<10; $i++)
        {
            
            
            $lUrl="https://eun1.api.riotgames.com/lol/league/v4/entries/by-summoner/" . $match->participants[$i]->summonerId . "?api_key=". $apiKey;
            $l=json_decode($this->getHtml($lUrl));
            
            
            if($l==null || $l[0] == null || $l[0]->tier == ""){
                $tier = "UNRANKED";
                $rank = "";
            }
            else{
                $tier = $l[0]->tier;
                $rank = $l[0]->rank; 
            }
            array_push($dArray, $tier . "&nbsp;". $rank);
            
            $magija1=$match->participants[$i]->spell1Id;
            $magija2=$match->participants[$i]->spell2Id;
            array_push($spell1, (DataDragonAPI::getStaticSummonerSpellById($magija1))["image"]["full"] );
            array_push($spell2, (DataDragonAPI::getStaticSummonerSpellById($magija2))["image"]["full"] );
            
            $champId=$match->participants[$i]->championId;
          
            
            $champion = $api->getStaticChampion($champId)->name;
            array_push($champArray, $champion);
            
            //var_dump($champion);
            //echo "\n";
            
        }
        
        $rez=$this->calculatingWinRatesV2($match);
        $winRateArray=$rez["wr"];
        $arK=$rez["k"];
        $arD=$rez["a"];
        $arA=$rez["d"];
        //var_dump($arK);
        
       
        $players=[
                'summoner11' => ['name' => $match->participants[0]->summonerName,  'div'=> $dArray[0],  'champ'=>$champArray[0], 'sp1'=>$spell1[0], 'sp2'=>$spell2[0], 'winrate'=>$winRateArray[0], 'k'=>$arK[0], 'a'=>$arA[0], 'd'=>$arD[0]],
                'summoner12' => ['name' => $match->participants[1]->summonerName,  'div'=> $dArray[1],  'champ'=>$champArray[1], 'sp1'=>$spell1[1], 'sp2'=>$spell2[1], 'winrate'=>$winRateArray[1], 'k'=>$arK[1], 'a'=>$arA[1], 'd'=>$arD[1]],
                'summoner13' => ['name' => $match->participants[2]->summonerName,  'div'=> $dArray[2],  'champ'=>$champArray[2], 'sp1'=>$spell1[2], 'sp2'=>$spell2[2], 'winrate'=>$winRateArray[2], 'k'=>$arK[2], 'a'=>$arA[2], 'd'=>$arD[2]],
                'summoner14' => ['name' => $match->participants[3]->summonerName,  'div'=> $dArray[3],  'champ'=>$champArray[3], 'sp1'=>$spell1[3], 'sp2'=>$spell2[3], 'winrate'=>$winRateArray[3], 'k'=>$arK[3], 'a'=>$arA[3], 'd'=>$arD[3]],
                'summoner15' => ['name' => $match->participants[4]->summonerName,  'div'=> $dArray[4],  'champ'=>$champArray[4], 'sp1'=>$spell1[4], 'sp2'=>$spell2[4], 'winrate'=>$winRateArray[4], 'k'=>$arK[4], 'a'=>$arA[4], 'd'=>$arD[4]],
                'summoner21' => ['name' => $match->participants[5]->summonerName,  'div'=> $dArray[5],  'champ'=>$champArray[5], 'sp1'=>$spell1[5], 'sp2'=>$spell2[5], 'winrate'=>$winRateArray[5], 'k'=>$arK[5], 'a'=>$arA[5], 'd'=>$arD[5]],
                'summoner22' => ['name' => $match->participants[6]->summonerName,  'div'=> $dArray[6],  'champ'=>$champArray[6], 'sp1'=>$spell1[6], 'sp2'=>$spell2[6], 'winrate'=>$winRateArray[6], 'k'=>$arK[6], 'a'=>$arA[6], 'd'=>$arD[6]],
                'summoner23' => ['name' => $match->participants[7]->summonerName,  'div'=> $dArray[7],  'champ'=>$champArray[7], 'sp1'=>$spell1[7], 'sp2'=>$spell2[7], 'winrate'=>$winRateArray[7], 'k'=>$arK[7], 'a'=>$arA[7], 'd'=>$arD[7]],
                'summoner24' => ['name' => $match->participants[8]->summonerName,  'div'=> $dArray[8],  'champ'=>$champArray[8], 'sp1'=>$spell1[8], 'sp2'=>$spell2[8], 'winrate'=>$winRateArray[8], 'k'=>$arK[8], 'a'=>$arA[8], 'd'=>$arD[8]],
                'summoner25' => ['name' => $match->participants[9]->summonerName,  'div'=> $dArray[9],  'champ'=>$champArray[9], 'sp1'=>$spell1[9], 'sp2'=>$spell2[9], 'winrate'=>$winRateArray[9], 'k'=>$arK[9], 'a'=>$arA[9], 'd'=>$arD[9]]
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
    
}



