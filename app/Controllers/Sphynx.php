<?php

namespace App\Controllers;

use App\Models\SphynxModel;

class Sphynx extends BaseController
{
    public function index()
    {
        $model = new SphynxModel();
        $data['sphynx'] = $model->findAll();

        return view('sphynx', $data);
    }
}
