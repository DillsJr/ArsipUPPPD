<?php

namespace App\Models;

use CodeIgniter\Model;

class ADLaporanModel extends Model
{
    protected $table = "laporan";
    protected $primaryKey = "idlprn";
    protected $returnType = "object";
    protected $allowedFields = ['idlprn', 'isi_lprn', 'idarsp', 'judul_arsp', 'idptgs','nama_ptgs', 'status_arsp'];

    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM laporan ORDER BY idlprn ASC");
        return $query->getResult();
    }

    public function getLaporanById($idlprn)
    {
        return $this->find($idlprn);
    }

    public function getAllArsip()
    {
        $query = $this->db->query("SELECT idarsp, judul_arsp FROM arsip ORDER BY idarsp ASC");
        return $query->getResult();
    }

    public function getAllPetugas()
    {
        $query = $this->db->query("SELECT idptgs, nama_ptgs FROM petugas ORDER BY idptgs ASC");
        return $query->getResult();
    }

    public function updateLap($idlprn, $data)
    {
        $this->update($idlprn, $data);
    }

    public function hapusLap($idlprn)
    {
        $this->delete($idlprn);
    }
    
    public function getPaginatedData($limit, $offset, $search = null)
    {
        $builder = $this->builder();

        if ($search) {
            $builder->like('idlprn', $search)
                    ->orLike('isi_lprn', $search)
                    ->orLike('idarsp', $search)
                    ->orLike('judul_arsp', $search)
                    ->orLike('idptgs', $search)
                    ->orLike('nama_ptgs', $search);
        }

        return [
            'data' => $builder->get($limit, $offset)->getResult(),
            'total' => $builder->countAllResults(false)
        ];
    }
}