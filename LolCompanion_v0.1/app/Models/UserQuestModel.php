<?php

namespace App\Models;

use CodeIgniter\Model;

class UserQuestModel extends Model
{
    protected $table      = 'userquest';
    protected $primaryKey = '(questId,userId)';

    // protected $useAutoIncrement = false;  ?

    protected $returnType     = 'object';

    protected $allowedFields = ['questId', 'userId', 'completed'];
}