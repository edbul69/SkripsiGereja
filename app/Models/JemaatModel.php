<?php

namespace App\Models;

use CodeIgniter\Model;

class JemaatModel extends Model
{
    protected $table = 'tb_jemaat';
    protected $useTimestamp = true;
    protected $allowedFields = ['nama', 'alamat', 'telp', 'tgl_lahir', 'jns_kelamin'];

    public function simpanJemaat($data)
    {
        return $this->insert($data);
    }
}
