<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'tb_berita';
    protected $allowedFields = ['title', 'img', 'text', 'source', 'created', 'modified', 'author'];

    public function getBerita($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
