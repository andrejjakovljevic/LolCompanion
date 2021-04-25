<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestAttributeModel extends Model
{
    protected $table      = 'questattributes';
    protected $primaryKey = '(attributeId)';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['attributeId', 'questId', 'attributeKey', 'attributeValue'];
}