<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AksesModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('Admin/auth/index');
    }

    public function login()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userCek = new AksesModel();
        $cek = $userCek->where('username', $username)->first();

        if ($cek) {
            $checkPassword = password_verify($password, $cek['password']);
            if ($checkPassword) {

                $sessData = [
                    'id' => $cek['id'],
                    'username' => $cek['username'],
                    'name' => $cek['name'],
                    'role' => $cek['role'],
                    'logged_in' => TRUE,
                ];
                $session->set($sessData);
                switch ($cek['role']) {
                    case 'admin':
                        return redirect()->to('/Dashboard');
                        break;
                    case 'engineer':
                        return redirect()->to('/Dashboard');
                        break;
                    default:
                        session()->setFlashdata('pesan', 'Login gagal!, Akun Belum Terdaftar!');
                        return redirect()->to('/login');
                        break;
                }
            } else {
                session()->setFlashdata('pesan', 'Login Gagal!, Password Salah!');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('pesan', 'Login gagal!, Username Tidak Ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();

        // Update last_login
        $userId = $session->get('id');
        $aksesModel = new AksesModel();
        $aksesModel->update($userId, ['last_login' => date('Y-m-d H:i:s')]);
        $session->destroy();
        return redirect()->to('/login');
    }
}
