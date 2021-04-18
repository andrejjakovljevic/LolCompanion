<?php

namespace App\Models;

use CodeIgniter\Model;

class GlobalModel extends Model
{
    protected $table      = 'global';
    protected $primaryKey = 'name';

    protected $useAutoIncrement = false;

    protected $returnType     = 'object';

    protected $allowedFields = ['name', 'value'];
}