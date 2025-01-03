<?php

namespace App\Controllers;

class Galeri extends BaseController
{
    public function index(): string
    {
        return view('galeri');
    }
}
