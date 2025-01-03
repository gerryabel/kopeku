<?php

namespace App\Controllers;

use App\Models\DomestikModel;

class Domestik extends BaseController
{
    public function index()
    {
        $model = new DomestikModel();
        $data['domestik'] = $model->findAll();

        return view('domestik', $data);
    }
}
