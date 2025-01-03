<?php

namespace App\Controllers;

use App\Models\PersiaModel;

class Persia extends BaseController
{
    public function index()
    {
        $model = new PersiaModel();
        $data['persia'] = $model->findAll();

        return view('persia', $data);
    }
}
