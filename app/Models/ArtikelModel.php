<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table      = 'artikel'; // Nama tabel dalam database
    protected $primaryKey = 'id'; // Nama kolom primary key

    protected $allowedFields = ['judul', 'isi', 'gambar', 'isi1', 'isi2']; // Kolom-kolom yang diizinkan untuk diisi

    // Metode untuk mendapatkan semua data artikel
    public function getAllArtikel()
    {
        return $this->findAll();
    }

    // Metode untuk mendapatkan satu data artikel berdasarkan ID
    public function getArtikel($id)
    {
        return $this->find($id);
    }

    // Metode untuk menyimpan data artikel baru
    public function insertArtikel($data)
    {
        return $this->insert($data);
    }

    // Metode untuk mengupdate data artikel berdasarkan ID
    public function updateArtikel($id, $data)
    {
        return $this->update($id, $data);
    }

    // Metode untuk menghapus data artikel berdasarkan ID
    public function deleteArtikel($id)
    {
        return $this->delete($id);
    }
}
