<?php

namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'summonerName';

    protected $returnType     = 'object';

    protected $allowedFields = ['sumonnerName', 'password', 'email','role'];
}