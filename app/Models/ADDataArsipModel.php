<?php

namespace App\Models;

use CodeIgniter\Model;

class ADDataArsipModel extends Model
{
    protected $table = "arsip";
    protected $primaryKey = "idarsp";
    protected $returnType = "object";
    protected $allowedFields = ['idarsp', 'judul_arsp', 'kat_arsp', 'idwp', 'nama_wp', 'idptgs', 'nama_ptgs', 'tgl_pembuatan', 'status_arsp'];

    public function getdata()
    {
        // Show Data DP berdasarkan ID
        $query = $this->db->query("SELECT * FROM arsip ORDER BY idarsp ASC");

        return $query->getResult();
    }

    public function getArsipById($idarsp)
    {
        // Ambil Arsip berdasarkan ID
        return $this->find($idarsp);
    }

    public function getAllWajibPajak()
    {
        $query = $this->db->query("SELECT idwp, nama_wp FROM wajibpajak ORDER BY idwp ASC");
        return $query->getResult();
    }

        public function getAllPetugas()
    {
        $query = $this->db->query("SELECT idptgs, nama_ptgs FROM petugas ORDER BY idptgs ASC");
        return $query->getResult();
    }

    public function updateDA($idarsp, $data)
    {
        // Update Arsip berdasarkan ID
        $this->update($idarsp, $data);
    }

    public function hapusDA($idarsp)
    {
        // Hapus Arsip berdasarkan ID
        $this->delete($idarsp);
    }

    public function getPaginatedData($limit, $offset, $search = null)
    {
        $builder = $this->builder();

        if ($search) {
            $builder->like('idarsp', $search)
                    ->orLike('judul_arsp', $search)
                    ->orLike('kat_arsp', $search)
                    ->orLike('nama_wp', $search)
                    ->orLike('nama_ptgs', $search)
                    ->orLike('tgl_pembuatan', $search)
                    ->orLike('status_arsp', $search);
        }

        return [
            'data' => $builder->get($limit, $offset)->getResult(),
            'total' => $builder->countAllResults(false)
        ];
    }
}

?>