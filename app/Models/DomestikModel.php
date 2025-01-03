<?php

namespace App\Models;

use CodeIgniter\Model;

class DomestikModel extends Model
{
    protected $table = 'domestik';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'harga', 'lokasi', 'deskripsi', 'gambar', 'nomor_whatsapp', 'alamat_google_maps'
    ];
}
?>
