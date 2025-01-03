<?php

namespace App\Controllers;

use App\Models\PersiaModel;

class Detailpersia extends BaseController
{
    public function detail($id)
    {
        $model = new PersiaModel();
        $data['persia'] = $model->find($id);
        
        return view('detailkucingpersia', $data);
    }
}