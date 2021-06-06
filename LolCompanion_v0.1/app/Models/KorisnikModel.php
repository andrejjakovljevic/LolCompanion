<?php
/*
 * Autor: Andrej Jakovljevic 18/0039
 */
namespace App\Models;

use CodeIgniter\Model;

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
 * Autori:  Dragan Milovancevic md180153 i Veljko Rvovic rv180132
 * Klasa KorisnikModel sadrzi funkcije za komunikaciju sa bazom u vezi tabele koja sadrzi informacije o korisnicima
 * @version 1.0
 */
class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'summonerName';
    protected $useAutoIncrement = false;

    protected $returnType     = 'object';

    protected $allowedFields = ['summonerName', 'password', 'email','role', 'lastGamePlayed'];
    
    /**
     * Autor Dragan Milovancevic md180153
     * Funkcija poziva pomocne funkcije za obradu meceva i pamti obradjene meceve u bazi
     * @param string summonerName Korisnicno ime
     */
    public static function updateWrapper($summonerName) {
        //KorisnikModel::resetPlays($summonerName);
        DataDragonAPI::initByCDN();
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => GlobalModel::getApiKey(),
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);

        $modelKorisnik = new KorisnikModel();
        $summoner = $modelKorisnik->find($summonerName);
        if ($summoner->lastGamePlayed == NULL) {
            $summoner->lastGamePlayed = 0;
        }
        $matchlist = $api->getMatchListByAccount($api->getSummonerByName($summonerName)->accountId)->matches;

        $modelPlays = new PlaysModel();
        $userQuests = (new UserQuestModel())->where('summonerName', $summonerName)->where('completed', 0)->orderBy("questId", "DESC")->find();
        $limit = 0;
        for($i = count($matchlist) - 1; $i >= 0; --$i) {
            $match = $matchlist[$i];
            if(($match->timestamp / 1000 - 1) <= $summoner->lastGamePlayed)
                continue;
            if ($match->queue != 420 && $match->queue != 400 && $match->queue != 430 && $match->queue != 440)
                continue;
            if (++$limit > 50) {
                break;
            }
            $matchO = $api->getMatch($match->gameId);
            if($match->queue == 420)
                PlaysModel::updatePlayed($summonerName, $matchO, $api, $modelPlays, $match);
            
            
            QuestModel::questsProgress($api, $matchO, $userQuests, $summonerName);
            
            $summoner->lastGamePlayed = $match->timestamp / 1000;
            $modelKorisnik->save($summoner);
        }
    }
    
    /**
     * Autor Veljko Rvovic rv180132
     * Funkcija koja brise podatke u bazi o statistici korisnika na herojima
     * @param string summonerName Korisnicko ime
     */
    public static function resetPlays($summonerName)
    {
        $playsM = new PlaysModel();
        $playsM->truncate();
        $korisnikM = new KorisnikModel();
        $user = $korisnikM->where('summonerName', $summonerName)->first();
        $user->lastGamePlayed = 0;
        $korisnikM->save($user);
    }
    
    /**
     * Autor: Dragan Milovancevic md180153
     * Funckija za dohvatanje istorije igara za zadatog korisnika koristeci v4 match api
     * @param string summonerName Korisnicko ime
     * @return array
     */
     public static function getMatchHistory($summonerName) {
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
            // $ago_str = $match->timestamp / 1000;
            $players = [];
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
}