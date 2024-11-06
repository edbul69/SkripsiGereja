<?php

namespace App\Models;

use CodeIgniter\Model;

class JemaatModel extends Model
{
    protected $table = 'tb_jemaat'; // Your table name

    // Enable automatic timestamps for the `created` and `modified` fields
    protected $useTimestamps = true;

    // Define the column names for created and modified timestamps
    protected $createdField = 'created';  // Column for record creation time
    protected $updatedField = 'modified'; // Column for record last update time

    // Specify which columns can be set by insert/update
    protected $allowedFields = ['nama', 'tgl_lahir', 'asal', 'jns_kelamin', 'telp', 'alamat', 'api_code'];


    public function getJemaat($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
