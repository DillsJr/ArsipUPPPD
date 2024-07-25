<?php

namespace App\Models;

use CodeIgniter\Model;

class ADDataPetugasModel extends Model
{
    protected $table = "petugas";
    protected $primaryKey = "idptgs";
    protected $returnType = "object";
    protected $allowedFields = ['idptgs', 'nama_ptgs', 'notlp', 'jabatan', 'jenis_kelamin'];

    public function getdata()
    {
        // Ambil semua data petugas dari database
        return $this->findAll();
    }

    public function getPetugasById($idptgs)
    {
        // Ambil Petugas berdasarkan ID
        return $this->find($idptgs);
    }

    public function updateDP($idptgs, $data)
    {  
        // Update Petugas berdasarkan ID
        return $this->update($idptgs, $data);
    }

    public function hapusDP($idptgs)
    {
        // Hapus data Petugas berdasarkan ID
        $this->delete($idptgs);
    }

    public function getPaginatedData($limit, $offset, $search = null)
    {
        $builder = $this->builder();

        if ($search) {
            $builder->like('idptgs', $search)
                    ->orLike('nama_ptgs', $search)
                    ->orLike('notlp', $search)
                    ->orLike('jabatan', $search)
                    ->orLike('jenis_kelamin', $search);
        }

        return [
            'data' => $builder->get($limit, $offset)->getResult(),
            'total' => $builder->countAllResults(false)
        ];
    }
}

?>