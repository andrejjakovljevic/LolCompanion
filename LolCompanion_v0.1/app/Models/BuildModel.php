<?php
/*
 * Autor: Andrej Jakovljevic 18/0039
 */
namespace App\Models;

use CodeIgniter\Model;

class BuildModel extends Model
{
    protected $table      = 'builds';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['id', 'iditem1', 'iditem2', 'iditem3', 'idchamp', 'winrate', 'lane', 'perk0', 'perk1', 'perk2', 
        'perk3', 'perk4', 'perk5', 'attrperk0', 'attrperk1', 'attrperk2', 'iditem4', 'iditem5', 'iditem6'];
}