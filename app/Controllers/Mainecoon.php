<?php

namespace App\Controllers;

use App\Models\MainecoonModel;

class Mainecoon extends BaseController
{
    public function index()
    {
        $model = new MainecoonModel();
        $data['mainecoon'] = $model->findAll();

        return view('mainecoon', $data);
    }
}
