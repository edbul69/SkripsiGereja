<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'tb_berita';

    protected $useTimestamps = true;


    protected $createdField = 'created';  // Column for record creation time
    protected $updatedField = 'modified'; // Column for record last update time

    protected $allowedFields = ['title', 'slug', 'img', 'text', 'source', 'author'];

    public function getBerita($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    
    public function getTitleBySlug($slug)
    {
        $result = $this->select('title')->where(['slug' => $slug])->first();
        return $result ? $result['title'] : null; // Return title or null if not found
    }

}
