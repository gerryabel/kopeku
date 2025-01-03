<?php

namespace App\Controllers;

use App\Models\AnggoraModel;

class Detailanggora extends BaseController
{
    public function detail($id)
    {
        $model = new AnggoraModel();
        $data['anggora'] = $model->find($id);
        
        return view('detailkucinganggora', $data);
    }
}
