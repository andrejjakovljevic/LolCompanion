<?php
/*
 * Autor: Dragan Milovancevic 18/0153
 */
namespace App\Models;

use CodeIgniter\Model;

class PlaysModel extends Model
{
    protected $table      = 'plays';
    protected $primaryKey = '(summonername,idchamp)';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['summonername', 'idchamp', 'games_won', 'games_played'];
}