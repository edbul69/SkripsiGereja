<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    // Nama tabel database yang akan digunakan oleh model ini.
    protected $table      = 'tb_anggota';

    // Nama kolom primary key dari tabel.
    protected $primaryKey = 'idanggota';

    // Menentukan apakah primary key adalah auto-incrementing.
    protected $useAutoIncrement = true;

    // Tipe data yang akan dikembalikan saat mengambil hasil (array atau object).
    protected $returnType     = 'array';

    // Menentukan apakah soft deletes akan digunakan.
    protected $useSoftDeletes = false; // Tidak ada kolom 'deleted_at' di tabel Anda.

    // Kolom-kolom yang diizinkan untuk diisi secara massal (mass assignment).
    protected $allowedFields = [
        'namalengkap',
        'tanggallahir',
        'rayon'
    ];

    // Menentukan apakah model akan secara otomatis mengelola kolom created dan modified.
    protected $useTimestamps = true;
    protected $createdField  = 'created';  // Kolom untuk waktu pembuatan record
    protected $updatedField  = 'modified'; // Kolom untuk waktu terakhir update record

    // Aturan validasi untuk kolom.
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
