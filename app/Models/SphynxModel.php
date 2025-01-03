<?php

namespace App\Models;

use CodeIgniter\Model;

class SphynxModel extends Model
{
    protected $table = 'sphynx';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'harga', 'lokasi', 'deskripsi', 'gambar', 'nomor_whatsapp', 'alamat_google_maps'
    ];
}
?>
