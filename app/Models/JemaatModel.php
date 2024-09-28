<?php

namespace App\Models;

use CodeIgniter\Model;

class JemaatModel extends Model
{
    protected $table = 'tb_jemaat';
    protected $useTimestamp = true;
    protected $createdField = 'created';
    protected $updatedField = 'modified';
}
