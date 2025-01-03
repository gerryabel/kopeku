<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MainecoonModel;

class MainecoonController extends BaseController
{
    public function index()
    {
        $model = new MainecoonModel();
        $data['mainecoon'] = $model->findAll();

        return view('admin/mainecoon/index', $data);
    }

    public function create()
    {
        return view('admin/mainecoon/create');
    }

    public function store()
    {
        $model = new MainecoonModel();

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

        return redirect()->to('/admin/mainecoon');
    }

    public function edit($id)
    {
        $model = new MainecoonModel();
        $data['mainecoon'] = $model->find($id);

        return view('admin/mainecoon/edit', $data);
    }

    public function update($id)
    {
        $model = new MainecoonModel();

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

        return redirect()->to('/admin/mainecoon');
    }

    public function delete($id)
    {
        $model = new MainecoonModel();
        $model->delete($id);

        return redirect()->to('/admin/mainecoon');
    }
}
?>
