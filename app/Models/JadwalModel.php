<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'tb_jadwal';

    protected $useTimestamps = true;

    protected $createdField = 'created';  // Column for record creation time
    protected $updatedField = 'modified'; // Column for record last update time

    protected $allowedFields = ['title', 'start', 'location', 'description', 'by'];

    public function getJadwal($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
