<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function artikel()
    {
        return view('admin/artikel');
    }

    public function kucing($jenis)
    {
        $data = ['jenis' => $jenis];
        return view('admin/kucing', $data);
    }
}