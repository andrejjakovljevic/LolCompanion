<?php
/*
 * Autor: Andrej Jakovljevic 18/0039
 */
namespace App\Models;

use CodeIgniter\Model;
use App\Models\KorisnikModel;
use App\Models\GlobalModel;
use App\Models\ChampionModel;
use App\Models\BuildModel;
use RiotAPI\LeagueAPI\LeagueAPI;
use RiotAPI\Base\Definitions\Region;
use RiotAPI\DataDragonAPI\DataDragonAPI;
use voku\helper\HtmlDomParser;

/**
 * Autori:  Andrej Jakovljevic ja180039
 * Klasa BuildModel sadrzi funkcije za komunikaciju sa bazom u vezi tabele koja prikazuje najbolje strategije za heroja
 * @version 1.0
 */
class BuildModel extends Model
{
    protected $table      = 'builds';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['id', 'iditem1', 'iditem2', 'iditem3', 'idchamp', 'winrate', 'lane', 'perk0', 'perk1', 'perk2', 
        'perk3', 'perk4', 'perk5', 'attrperk0', 'attrperk1', 'attrperk2', 'iditem4', 'iditem5', 'iditem6'];
    
        /**
         * Funkcija koja ubacuje podatke o najboljim strategijama za heroja u bazu
         * @param type $curr_data - podaci o heroju
         * @param type $champId - id heroja
         */
        public static function get_info($curr_data,$champId)
        {
            $h = $curr_data["name"];
            $h = str_replace("'", "", $h);
            $h = str_replace(" ", "", $h);
            $html = HtmlDomParser::file_get_html("https://app.mobalytics.gg/lol/champions/" . $h . "/build");
            $tmp = $html->findMultiOrFalse('.css-zg1vud');
            $primary = $tmp[0];
            $secondary = $tmp[1];
            $primaryRunesGlavna = $primary->findMultiOrFalse('.css-1bdyqpk, .css-1054us4'); // glavne rune primaryija
            $secondaryRunes = $secondary->findMultiOrFalse('.css-1054us4');
            $rune = [];
            foreach ($primaryRunesGlavna as $primaryRune)
            {
                if ($primaryRune->class=='css-1bdyqpk') // glavna
                {
                    $help = $primaryRune->src;
                    $niz = explode("/", $help);
                    $id = explode(".",$niz[count($niz)-1]);
                    $id = $id[0];
                    if ($id!="") $rune[count($rune)]=$id;
                }
                if ($primaryRune->class=='css-1054us4') // sporedne
                {
                    $help = $primaryRune->src;
                    $niz = explode("/", $help);
                    $id = explode(".",$niz[count($niz)-1]);
                    $id = $id[0];
                    if ($id!="") $rune[count($rune)]=$id;
                }
            }
            foreach ($secondaryRunes as $secondaryRune)
            {
                if ($secondaryRune->class=='css-1054us4') // sporedne
                {
                    $help = $secondaryRune->src;
                    $niz = explode("/", $help);
                    $id = explode(".",$niz[count($niz)-1]);
                    $id = $id[0];
                    if ($id!="") $rune[count($rune)]=$id;
                }
            }
            $tmp = $html->findMultiOrFalse('.css-h82iku');
            $items = $tmp->findMultiOrFalse('.css-cku98t');
            $itemi = [];
            foreach ($items as $item)
            {
                $source = $item->src;
                $niz = explode("/", $source);
                $id = explode(".",$niz[count($niz)-1]);
                $id = $id[0];
                if ($id!="" && !in_array($id,$itemi) && count($itemi)<6 && $id!="3340" && $id!="2055") $itemi[count($itemi)]=$id;
            }
            // nadji winrate
            $winrateSpan = $html->find('.css-19skug1',0);
            $text = $winrateSpan->plainText;
            $winrate = substr($text, 0, strlen($text)-1);
            // nadji role 
            $rolespan = $html->find('.css-r4pnt5',0);
            $reci = explode("???",$rolespan->plainText);
            $role = substr($reci[0], 0, strlen($reci[0])-2);
            // atribute perksovi
            $attributePerks = $html->findMultiOrFalse('.css-1vgqbrs');
            $atperks = [];
            foreach ($attributePerks as $perk)
            {
                if ($perk->src=="") continue;
                $source = $perk->src;
                $niz = explode("/", $source);
                $id = explode(".",$niz[count($niz)-1]);
                $id = $id[0];
                $atperks[count($atperks)]=$id;
            }
            $build = [];
            $build["idchamp"]=$champId;
            $build["iditem1"]=(count($itemi)>=1?intval($itemi[0]):null);
            $build["iditem2"]=(count($itemi)>=2?intval($itemi[1]):null);
            $build["iditem3"]=(count($itemi)>=3?intval($itemi[2]):null);
            $build["iditem4"]=(count($itemi)>=4?intval($itemi[3]):null);
            $build["iditem5"]=(count($itemi)>=5?intval($itemi[4]):null);
            $build["iditem6"]=(count($itemi)>=6?intval($itemi[5]):null);
            $build["winrate"]=floatval($winrate);
            $build["lane"]=$role;
            $build["perk0"]=$rune[0];
            $build["perk1"]=$rune[1];
            $build["perk2"]=$rune[2];
            $build["perk3"]=$rune[3];
            $build["perk4"]=$rune[4];
            $build["perk5"]=$rune[5];
            $build["attrperk0"]=$atperks[0];
            $build["attrperk1"]=$atperks[1];
            $build["attrperk2"]=$atperks[2];
            $buildModel = new BuildModel();
            $buildModel->insert($build);
        }
        
        public static function returnChampionData($res,$champion)
        {
            $rr=$res[0];
                
            $runeUId = 
            [
                "inspiration" => [8351,8358,8360,8306,8304,8313,8321,8316,8345,8347,8410,8352],
                "precision" => [8005,8008,8021,8010,9101,9111,8009,9104,9105,9103,8014,8017,8299],
                "resolve" => [8437,8439,8465,8446,8463,8401,8429,8444,8473,8451,8453,8242],
                "domination" => [8112,8124,8128,9923,8126,8139,8143,8136,8120,8138,8135,8134,8105,8106],
                "sorcery" => [8214,8229,8230,8224,8226,8275,8210,8234,8233,8237,8232,8236]
            ];

            $attrPerk =
            [
                "red1" => [5008,5005,5007],
                "red2" => [5008,5002,5003],
                "red3" => [5001,5002,5003]
            ];

            $typePrimary = "inspiration";
            if (in_array($rr->perk0, $runeUId["precision"])) $typePrimary="precision";
            if (in_array($rr->perk0, $runeUId["resolve"])) $typePrimary="resolve";
            if (in_array($rr->perk0, $runeUId["domination"])) $typePrimary="domination";
            if (in_array($rr->perk0, $runeUId["sorcery"])) $typePrimary="sorcery";
            $typeSecondary = "inspiration";
            if (in_array($rr->perk5, $runeUId["precision"])) $typeSecondary="precision";
            if (in_array($rr->perk5, $runeUId["resolve"])) $typeSecondary="resolve";
            if (in_array($rr->perk5, $runeUId["domination"])) $typeSecondary="domination";
            if (in_array($rr->perk5, $runeUId["sorcery"])) $typeSecondary="sorcery";
            $perks = [];
            $perks[count($perks)]= $rr->perk0;
            $perks[count($perks)]= $rr->perk1;
            $perks[count($perks)]= $rr->perk2;
            $perks[count($perks)]= $rr->perk3;
            $perks[count($perks)]= $rr->perk4;
            $perks[count($perks)]= $rr->perk5;
            $attrperks = [];
            $attrperks[count($attrperks)] = $rr->attrperk0;
            $attrperks[count($attrperks)] = $rr->attrperk1;
            $attrperks[count($attrperks)] = $rr->attrperk2; 

            $data = [
                    'name' => $champion->name,
                    'icon' => DataDragonAPI::getChampionIconO($champion),
                    'item1' => DataDragonAPI::getItemIconUrl($rr->iditem1),
                    'item2' => DataDragonAPI::getItemIconUrl($rr->iditem2),
                    'item3' => DataDragonAPI::getItemIconUrl($rr->iditem3),
                    'item4' => DataDragonAPI::getItemIconUrl($rr->iditem4),
                    'item5' => DataDragonAPI::getItemIconUrl($rr->iditem5),
                    'item6' => DataDragonAPI::getItemIconUrl($rr->iditem6),
                    'winrate' => $rr->winrate,
                    'role' => $rr->lane,
                    'perks' => $perks,
                    'type' => $typePrimary,
                    'typeSec' => $typeSecondary,
                    'niz' => $runeUId,
                    'attrperks' => $attrperks,
                    'nizAttrPerk' => $attrPerk
            ];
            
            return $data;
        }
        
        public static function returnStatisticsData()
        {
            $htmltop = HtmlDomParser::file_get_html("https://rankedboost.com/lol-tier-list-solo-queue/");
            $tabela = $htmltop->find(".rankedBoost-lol-table");
            $tabela = $tabela[count($tabela)-1];
            $niz = ['.top','.jungle','.middle','.adc','.support'];
            $podaci = [];
            foreach ($niz as $role)
            {
                $red = $tabela->find($role,0);
                $ime = $red->find(".champion_name-tl",0)->plainText;
                $winrate = $red->find(".tl-win-perc",0)->plainText;
                $pickrate = $red->find(".stat-tl-play-perc",0)->plainText;
                $banrate = $red->find(".tl-ban-rate",0)->plainText;
		DataDragonAPI::initByCDN();
                $model = new ChampionModel();
                $ime = trim($ime);         
                $res = $model->where('name',$ime)->findAll();
                //var_dump($res);
                $res=$res[0];
                $id = $res->id;
                $icon = DataDragonAPI::getChampionIconUrl($ime);
                $help = [
                    "ikonica" => $icon,
                    "ime" => $ime,
                    "winrate" => $winrate,
                    "pickrate" => $pickrate,
                    "banrate" => $banrate,
                    "id" => $id
                     
                ];
                $podaci[count($podaci)]=$help;
            }
            $data = 
            [
                "podaci" => $podaci
            ];
            return $data;
        }
    
}