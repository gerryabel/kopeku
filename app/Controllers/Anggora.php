<?php

namespace App\Controllers;

use App\Models\AnggoraModel;

class Anggora extends BaseController
{
    public function index()
    {
        $model = new AnggoraModel();
        $data['anggora'] = $model->findAll();

        return view('anggora', $data);
    }
}
