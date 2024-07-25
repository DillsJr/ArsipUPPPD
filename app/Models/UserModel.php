<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'role'];

    // Metode untuk mencari pengguna berdasarkan username atau NPWP
    public function findByUsernameOrNPWP($username)
    {
        return $this->where('username', $username)
                    ->orWhere('npwp', $username) // Tambahkan field "npwp" jika ada
                    ->first();
    }
}
