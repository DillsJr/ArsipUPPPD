<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = "idkaryawan";
    protected $returnType = "object";
    protected $allowedFields = ['idkaryawan', 'nama_karyawan', 'idjabatan', 'tanggal_lahir', 'kota'];
}

?>