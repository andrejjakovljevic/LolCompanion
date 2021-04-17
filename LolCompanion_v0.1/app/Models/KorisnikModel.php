<?php

namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'summonerName';

    protected $useAutoIncrement = false;

    protected $returnType     = 'object';

    protected $allowedFields = ['summonerName', 'password', 'email','role'];
}