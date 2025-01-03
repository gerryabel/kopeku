<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        // Ambil data dari sesi untuk ditampilkan di halaman dashboard
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        echo view('admin/dashboard');
    }
    public function login()
    {
        helper(['form']);
        echo view('admin/login');
    }

    public function loginAuth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();

        if ($data) {
            if ($password === $data['password']) {
                $ses_data = [
                    'id'       => $data['id'],
                    'username' => $data['username'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/admin/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username Salah');
            return redirect()->to('/admin/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/admin/login');
    }
}
