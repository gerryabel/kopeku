<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'forum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'nama_pengirim', 'deskripsi', 'gambar', 'created_at'];
}