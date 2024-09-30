<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'tb_berita';

    protected $useTimestamps = true;


    protected $createdField = 'created';  // Column for record creation time
    protected $updatedField = 'modified'; // Column for record last update time

    protected $allowedFields = ['title', 'slug', 'img', 'text', 'source'];

    public function getBerita($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
