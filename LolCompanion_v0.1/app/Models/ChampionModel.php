<?php

namespace App\Models;

use CodeIgniter\Model;

class GlobalModel extends Model
{
    protected $table      = 'champions';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $returnType     = 'object';

    protected $allowedFields = ['id', 'name'];
}