<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'tb_jadwal';
    protected $allowedFields = ['title', 'start', 'end', 'description'];
}
