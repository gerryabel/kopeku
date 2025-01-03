<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SphynxModel;

class SphynxController extends BaseController
{
    public function index()
    {
        $model = new SphynxModel();
        $data['sphynx'] = $model->findAll();

        return view('admin/sphynx/index', $data);
    }

    public function create()
    {
        return view('admin/sphynx/create');
    }

    public function store()
    {
        $model = new SphynxModel();

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

        return redirect()->to('/admin/sphynx');
    }

    public function edit($id)
    {
        $model = new SphynxModel();
        $data['sphynx'] = $model->find($id);

        return view('admin/sphynx/edit', $data);
    }

    public function update($id)
    {
        $model = new SphynxModel();

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

        return redirect()->to('/admin/sphynx');
    }

    public function delete($id)
    {
        $model = new SphynxModel();
        $model->delete($id);

        return redirect()->to('/admin/sphynx');
    }
}
?>
