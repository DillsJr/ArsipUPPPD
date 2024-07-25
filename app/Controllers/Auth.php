<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        // Menampilkan halaman login
        return view('Login');
    }

    public function processLogin()
    {
        // Proses login disini
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role'); // Role bisa admin, user, atau petugas arsip

        // Validasi login
        if ($role === 'admin' && $username === 'admin' && $password === '123') {
            // Login berhasil sebagai admin
            // Misalnya, set session atau redirect ke halaman homepage admin
            return redirect()->to('/Roles/admin');
        } elseif ($role === 'pimpinan' && $username === 'pimpinan' && $password === '123') {
            // Login berhasil sebagai user
            // Misalnya, set session atau redirect ke halaman homepage user
            return redirect()->to('/Roles/pimpinan');
        } elseif ($role === 'petugas' && $username === 'petugas' && $password === '123') {
            // Login berhasil sebagai petugas arsip
            // Misalnya, set session atau redirect ke halaman homepage petugas arsip
            return redirect()->to('/Roles/petugas');
        } else {
            // Login gagal, kembali ke halaman login dengan pesan error
            return redirect()->to('/login')->with('error', 'Login gagal. Periksa kembali username, password, dan role Anda.');
        }
    }

    public function logout()
    {
        // Destroy the session
        session()->destroy();

        // Redirect to the login page
        return redirect()->to('/login');
    }

}