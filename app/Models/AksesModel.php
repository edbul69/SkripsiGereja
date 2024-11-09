<?php

namespace App\Models;

use CodeIgniter\Model;

class AksesModel extends Model
{
    protected $table = 'tb_akses';
    protected $primaryKey = 'id'; // Set 'id' as the primary key

    protected $allowedFields = ['username', 'name', 'password', 'role', 'last_login'];

    public function getAkses($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
