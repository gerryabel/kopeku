<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggoraModel extends Model
{
    protected $table = 'anggora';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'harga', 'lokasi', 'deskripsi', 'gambar', 'nomor_whatsapp', 'alamat_google_maps'
    ];
}
?>
