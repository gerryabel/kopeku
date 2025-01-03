<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        if(!$session->get('logged_in')){
            return redirect()->to('/login');
        }
        echo "Welcome, ".$session->get('username');
        echo "<a href='/auth/logout'>Logout</a>";
    }
}
