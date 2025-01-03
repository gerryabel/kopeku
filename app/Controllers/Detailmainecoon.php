<?php

namespace App\Controllers;

use App\Models\MainecoonModel;

class Detailmainecoon extends BaseController
{
    public function detail($id)
    {
        $model = new MainecoonModel();
        $data['mainecoon'] = $model->find($id);
        
        return view('detailkucingmainecoon', $data);
    }
}
