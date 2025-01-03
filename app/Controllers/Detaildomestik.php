<?php

namespace App\Controllers;

use App\Models\DomestikModel;

class Detaildomestik extends BaseController
{
    public function detail($id)
    {
        $model = new DomestikModel();
        $data['domestik'] = $model->find($id);
        
        return view('detailkucingdomestik', $data);
    }
}
