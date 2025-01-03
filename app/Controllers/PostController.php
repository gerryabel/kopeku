<?php

namespace App\Controllers;

use App\Models\PostkucingModel;
use CodeIgniter\Controller;

class PostController extends Controller
{
    public function index()
    {
        $postModel = new PostkucingModel();
        $data['posts'] = $postModel->findAll();

        return view('galeri', $data);
    }
    
    public function submitPost()
    {
        $postModel = new PostkucingModel();

        $judul = $this->request->getPost('judul');
        $nama_pengirim = $this->request->getPost('nama_pengirim');
        $deskripsi = $this->request->getPost('deskripsi');
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'gambar', $gambarName); // Pindahkan ke folder public/uploads
        } else {
            $gambarName = null;
        }

        $data = [
            'judul' => $judul,
            'nama_pengirim' => $nama_pengirim,
            'deskripsi' => $deskripsi,
            'gambar' => $gambarName,
        ];

        $postModel->save($data);

        return redirect()->to('/galeri');
    }
}
