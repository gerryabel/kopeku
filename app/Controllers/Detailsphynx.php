<?php

namespace App\Controllers;

use App\Models\SphynxModel;

class Detailsphynx extends BaseController
{
    public function detail($id)
    {
        $model = new SphynxModel();
        $data['sphynx'] = $model->find($id);
        
        return view('detailkucingsphynx', $data);
    }
}
