<?php
/*
 * Autor: Veljko Rvovic 18/0132
 */
namespace App\Models;

use CodeIgniter\Model;

class UserQuestModel extends Model
{
    protected $table      = 'userquest';
    protected $primaryKey = '(questId,summonerName)';

    protected $useAutoIncrement = true; 

    protected $returnType     = 'object';

    protected $allowedFields = ['questId', 'summonerName', 'completed'];
}