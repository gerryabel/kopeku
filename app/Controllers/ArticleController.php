<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class ArticleController extends BaseController
{
    public function index()
    {
        $model = new ArtikelModel();
        $data['articles'] = $model->findAll();

        echo view('artikel', $data);
    }

    public function view($id)
    {
        $model = new ArtikelModel();
        $data['article'] = $model->find($id);

        if (!$data['article']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Article with id ' . $id . ' not found');
        }

        echo view('isiartikel', $data);
    }
}
