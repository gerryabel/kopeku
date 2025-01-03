<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Beranda extends BaseController
{
    public function index()
    {
        $model = new ArtikelModel();
        
        // Ambil 4 artikel terbaru berdasarkan created_at dalam urutan menurun
        $data['articles'] = $model->orderBy('id', 'DESC')->findAll(4);

        echo view('beranda', $data);
    }
}
