<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestModel extends Model
{
    protected $table      = 'quest';
    protected $primaryKey = 'questId';

    protected $useAutoIncrement = true; 

    protected $returnType     = 'object';

    protected $allowedFields = ['questId', 'description', 'title', 'image'];
}