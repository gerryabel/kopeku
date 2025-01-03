<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnggoraModel;

class AnggoraController extends BaseController
{
    public function index()
    {
        $model = new AnggoraModel();
        $data['anggora'] = $model->findAll();

        return view('admin/anggora/index', $data);
    }

    public function create()
    {
        return view('admin/anggora/create');
    }

    public function store()
    {
        $model = new AnggoraModel();

        // Upload gambar
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $gambarName = $file->getRandomName();
            $file->move('uploads/', $gambarName);
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'lokasi' => $this->request->getPost('lokasi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $gambarName,
            'nomor_whatsapp' => $this->request->getPost('nomor_whatsapp'),
            'alamat_google_maps' => $this->request->getPost('alamat_google_maps'),
        ]);

        return redirect()->to('/admin/anggora');
    }

    public function edit($id)
    {
        $model = new AnggoraModel();
        $data['anggora'] = $model->find($id);

        return view('admin/anggora/edit', $data);
    }

    public function update($id)
    {
        $model = new AnggoraModel();

        // Upload gambar
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $gambarName = $file->getRandomName();
            $file->move('uploads/', $gambarName);
        } else {
            $gambarName = $this->request->getPost('gambar_lama');
        }

        $model->update($id, [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'lokasi' => $this->request->getPost('lokasi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $gambarName,
            'nomor_whatsapp' => $this->request->getPost('nomor_whatsapp'),
            'alamat_google_maps' => $this->request->getPost('alamat_google_maps'),
        ]);

        return redirect()->to('/admin/anggora');
    }

    public function delete($id)
    {
        $model = new AnggoraModel();
        $model->delete($id);

        return redirect()->to('/admin/anggora');
    }
}
?>
