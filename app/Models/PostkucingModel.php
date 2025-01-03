<?php

namespace App\Models;

use CodeIgniter\Model;

class PostkucingModel extends Model
{
    protected $table = 'postkucing';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'nama_pengirim', 'deskripsi', 'gambar'];
}
