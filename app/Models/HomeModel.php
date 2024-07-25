<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public function getdata()
    {
        // Ambil semua data petugas dari database
        return $this->findAll();
    }
}

?>