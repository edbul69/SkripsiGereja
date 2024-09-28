<?php

namespace App\Models;

use CodeIgniter\Model;

class LiveModel extends Model
{
    protected $table = 'tb_live';
    protected $allowedFields = ['link'];
}
