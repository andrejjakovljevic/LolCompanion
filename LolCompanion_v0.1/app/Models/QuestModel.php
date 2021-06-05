<?php
/*
 * Autor: Veljko Rvovic 18/0132
 */
namespace App\Models;

use CodeIgniter\Model;
use App\Models\KorisnikModel;
use App\Models\PlaysModel;
use App\Models\ChampionModel;
use App\Models\UserQuestModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use App\Models\QuestAttributeModel;
use App\Models\GlobalModel;
use RiotAPI\DataDragonAPI\DataDragonAPI;

/**
 * Autori:  Veljko Rvovic  rv180132
 * Klasa QuestModel sadrzi funkcije za komunikaciju sa bazom u vezi izazova
 * @version 1.0
 */
class QuestModel extends Model
{
    protected $table      = 'quest';
    protected $primaryKey = 'questId';

    protected $useAutoIncrement = true; 

    protected $returnType     = 'object';

    protected $allowedFields = ['questId', 'description', 'title', 'image'];
    
    /**
     * Autor: Veljko Rvovic rv180132
     * Funckija kreira i vraca objekat koji sadrzi sve izazove za trenutnog korisnika
     * @param $session trenutna sesija
     * @return array
     */
    public static function getChallenges($session) 
    {
        
        KorisnikModel::updateWrapper($session->get('user')->summonerName);
        
        $uQModel = new UserQuestModel();
        $qModel = new QuestModel();
        $uQ = $uQModel->where('summonerName', $session->get('user')->summonerName)->findAll();
        $poroUser = count($uQModel->where('summonerName', $session->get('user')->summonerName)->where('completed', 1)->findAll());
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
                'attributes' => QuestAttributeModel::getAttributes($quest->questId)
            ];
            
            $preReqSatisfied = true;
            $questRequired = null;
            foreach($dataQuest['attributes'] as $atr){
                if($atr->attributeKey == 'Prerequisite Id'){
                    $questRequired = intval($atr->attributeValue);
                    $preReQuest = $uQModel->where('questId', $questRequired)->where('summonerName',$session->get('user')->summonerName)->find();
                    if($preReQuest[0]->completed == 0){
                        $preReQuest = false;
                        break;
                    }  
                }   
                
                // quest has a prerequisite quest that is not completed
                if($preReqSatisfied == false){ 
                    continue;
                }
            }
            
            
                
            // $dataQuest['attributes'];
            array_push($data['quests'], $dataQuest);
        }
        return $data;
    }
    
    /**
     * Autor Veljko Rvovic rv180132
     * Funkcija obradjuje jedan mec i azurira podatke u bazi
     * @param RiotAPI api api
     * @param MatchDto matchO mec za obradu
     * @param array userQuests lista izazova
     * @param string summonerName Korisnicno ime
     */
    public static function questsProgress($api, $matchO, $userQuests, $summonerName)
    {
        $lastGamePlayedts = (new KorisnikModel())->find($summonerName)->lastGamePlayed;
        $qAttrModel = new QuestAttributeModel();
        $uqModel = new UserQuestModel();
       
        $game_ts = $matchO->gameCreation;
        
        // Check quests only for these gamemodes
        if ($matchO->queueId == 400)
            $type = "DRAFT";
        else if ($matchO->queueId == 420)
            $type = "RANKED";
        else if ($matchO->queueId == 430)
            $type = "BLIND";
        else if ($matchO->queueId == 440)
            $type = "FLEX";
        else return;

        $gameDuration = $matchO->gameDuration / 1000.;
        $goldEarned = 0;
        $champion = "";
        $goldPerMin = 0.;
        $firstTower = 0;
        $dmgDealt = 0;
        $dmgPerMin = 0.;
        $firstTower = false;
        $firstBlood = false;
        $largestMultiKill = 0;
        $role = "";
        $cs = 0;
        $csPerMin = 0;
        for ($i = 0; $i < 10; ++$i) {
            if($matchO->participantIdentities[$matchO->participants[$i]->participantId - 1]->player->summonerName != $summonerName)
                continue;

            $champion = $api->getStaticChampion($matchO->participants[$i]->championId)->name;
            $part = $matchO->participants[$i];
            $stats = $part->stats;
            $timeline = $part->timeline;
            
            $stats->championName = $api->getStaticChampion($matchO->participants[$i]->championId)->name;
            
            $goldEarned = $stats->goldEarned;
            $cs = $stats->totalMinionsKilled + $stats->neutralMinionsKilled;
            $csPerMin = $cs / ($gameDuration / 60.);
            $firstTower = $stats->firstTowerAssist;
            $goldPerMin = $goldEarned / ($gameDuration / 60.);
            $dmgDealt = $stats->totalDamageDealtToChampions;
            $dmgPerMin = $dmgDealt / ($gameDuration / 60.);
            $firstBlood = $stats->firstBloodKill;
            $firstTower = $stats->firstTowerAssist;
            $largestMultiKill = $stats->largestMultiKill;
            
            if($timeline->lane == "JUNGLE"){
                $role = "Jungle";
            }
            else if($timeline->lane == "BOTTOM" && $timeline->role == "DUO_SUPPORT"){
                $role = "Support";
            }
            else if($timeline->lane == "TOP"){
                $role = "Top";
            }
            else if($timeline->lane = "BOTTOM" && $timeline->role == "DUO_CARRY"){
                $role = "Adc";
            }
            else if($timeline->lane = "MIDDLE"){
                $role = "Mid";
            }
            else if($timeline->role == "DUO_SUPPORT"){
                $role = "Support";
            }
            else if($timeline->role == "DUO_CARRY"){
                $role = "Adc";
            }
            
            break;  
        }
        
        var_dump("CS per min: " . $csPerMin);
        var_dump("Dmg per min:" . $dmgPerMin);
        foreach($userQuests as $quest){
            $qAttributes = $qAttrModel->where("questId", $quest->questId)->find();
            
            $numOfNotCompleted = count($qAttributes);
            
            foreach($qAttributes as $qattribute){
                if($qattribute->attributeKey == "Prerequisite Id"){
                    foreach($userQuests as $uqPre){
                        if($uqPre->questId == intval($qattribute->attributeValue)){
                            $numOfNotCompleted--;
                            break;
                        }
                    }
                }
                if($qattribute->attributeKey == "champion" && 
                        ($qattribute->attributeValue == "Any" || $qattribute->attributeValue == "" || $qattribute->attributeValue == $champion))
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "role" && 
                        ($qattribute->attributeValue == "Any" || $qattribute->attributeValue == $role))
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "Kills" && $stats->kills >= intval($qattribute->attributeValue))
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "Gold per minute" && $goldPerMin >= floatval($qattribute->attributeValue))
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "Dmg per minute" && $dmgPerMin >= floatval($qattribute->attributeValue))
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "First turret" && $firstTower)
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "First blood" && $firstBlood)
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "Multikill" && $largestMultiKill >= intval($qattribute->attributeValue))
                    $numOfNotCompleted--;
                if($qattribute->attributeKey == "Cs per minute" && $csPerMin >= floatval($qattribute->attributeValue))
                    $numOfNotCompleted--;
            }
            if($numOfNotCompleted == 0){
                $userQuest = $uqModel->where("questId", $quest->questId)->where('summonerName', $summonerName)->find()[0];
                $userQuest->completed = 1;
        
                $uqModel->where('summonerName', $summonerName)->where('questId', $quest->questId)->delete();
                $uqModel->save($userQuest);
            }
        }
    }
    
}