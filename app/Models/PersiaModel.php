<?php

namespace App\Models;

use CodeIgniter\Model;

class PersiaModel extends Model
{
    protected $table = 'persia';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'harga', 'lokasi', 'deskripsi', 'gambar', 'nomor_whatsapp', 'alamat_google_maps'
    ];
}
?>