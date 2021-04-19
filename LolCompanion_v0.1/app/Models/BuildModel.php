<?php

namespace App\Models;

use CodeIgniter\Model;

class BuildModel extends Model
{
    protected $table      = 'builds';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['id', 'name'];
}