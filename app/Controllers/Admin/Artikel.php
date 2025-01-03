<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $data['artikel'] = $this->artikelModel->findAll();
        return view('admin/artikel/index', $data);
    }

    public function create()
    {
        return view('admin/artikel/create');
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $fileName = $file->getRandomName();
        $file->move('uploads', $fileName);

        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $fileName,
            'isi1' => $this->request->getPost('isi1'),
            'isi2' => $this->request->getPost('isi2'),
        ];

        $this->artikelModel->save($data);
        return redirect()->to('/admin/artikel');
    }

    public function edit($id)
    {
        $data['artikel'] = $this->artikelModel->find($id);
        return view('admin/artikel/edit', $data);
    }

    public function update($id)
    {
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
        } else {
            $fileName = $this->request->getPost('gambar_lama');
        }

        $data = [
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $fileName,
            'isi1' => $this->request->getPost('isi1'),
            'isi2' => $this->request->getPost('isi2'),
        ];

        $this->artikelModel->save($data);
        return redirect()->to('/admin/artikel');
    }

    public function delete($id)
    {
        $this->artikelModel->delete($id);
        return redirect()->to('/admin/artikel');
    }
}
