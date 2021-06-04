<?php
/*
 * Autor: Dragan Milovancevic 18/0153
 */
namespace App\Models;

use CodeIgniter\Model;

use App\Models\KorisnikModel;
use App\Models\ChampionModel;
use App\Models\UserQuestModel;
use App\Models\QuestModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use App\Models\QuestAttributeModel;
use App\Models\GlobalModel;
use RiotAPI\DataDragonAPI\DataDragonAPI;

/**
 * Autori:  Dragan Milovancevic md18013
 * Klasa PlaysModel sadrzi funkcije za komunikaciju sa bazom u vezi tabele koja prikazuje koje heroje je korisnik igrao
 * @version 1.0
 */
class PlaysModel extends Model
{
    protected $table      = 'plays';
    protected $primaryKey = '(summonername,idchamp)';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['summonername', 'idchamp', 'games_won', 'games_played'];
    
    /**
     * Autor Dragan Milovancevic md180153
     * Funkcija obradjuje jedan mec i azurira podatke u bazi
     * @param string summonerName Korisnicno ime
     * @param MatchDto matchO mec za obradu
     * @param RiotAPI api api
     * @param PlaysModel modelPlays model
     * @param object match match v4 object
     */
    public static function updatePlayed($summonerName, $matchO, $api, $modelPlays, $match) {
        $play = $modelPlays->where('summonername', $summonerName)->where('idchamp', (int) $match->champion)->first();
        if ($play == null) {
            $play = (object) [
                'summonername' => $summonerName,
                'idchamp' => (int) $match->champion,
                'games_won' => 0,
                'games_played' => 0
            ];
        }
        $play->games_played += 1;
        for ($j = 0; $j < 10; ++$j) {
            if ($matchO->participantIdentities[$matchO->participants[$j]->participantId - 1]->player->summonerName == $summonerName)
                $team = $matchO->participants[$j]->teamId;
        }
        if (($matchO->teams[0]->teamId == $team && $matchO->teams[0]->win == 'Win') || ($matchO->teams[1]->teamId == $team && $matchO->teams[1]->win == 'Win'))
            ++$play->games_won;

        $modelPlays->where('summonername', $summonerName)->where('idchamp', $match->champion)->delete();
        $modelPlays->insert($play);
    }
    
    /**
     * Autor Dragan Milovancevic md180153
     * Funkcija dohvata najigranije heroje zadatog korisnika
     * @param string summonerName Korisnicno ime
     * @return array
     */
    public static function getMostPlayed($summonerName) 
    {

        DataDragonAPI::initByCDN();
        $api = new LeagueAPI([
            LeagueAPI::SET_KEY    => 'RGAPI-15966e6c-4e1d-4880-827e-dffbacbe3836',
            LeagueAPI::SET_REGION => Region::EUROPE_EAST,
        ]);

        $modelPlays = new PlaysModel();
        
        KorisnikModel::updateWrapper($summonerName);

        $champ = [];
        $games = [];
        $wins = [];

        $plays = $modelPlays->where('summonername', $summonerName)->orderBy('games_played', 'desc')->findAll();

        $n = min([3, count($plays)]);
        for ($i = 0; $i < $n; ++$i) {
            array_push($champ, (int) $plays[$i]->idchamp);
            array_push($games, $plays[$i]->games_played);
            array_push($wins , $plays[$i]->games_won);
        }

        $splash = [];
        for ($i = 0; $i < $n; ++$i) {
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
    
}