<?php

namespace App\Models;

use CodeIgniter\Model;

class ADLaporanModel extends Model
{
    protected $table = "laporan_arsip";
    protected $primaryKey = "idarsp";
    protected $returnType = "object";
    protected $allowedFields = ['idarsp', 'judul_arsp', 'kat_arsp', 'idwp', 'nama_wajib_pajak', 'idptgs','nama_petugas', 'tgl_pembuatan', 'status_arsp', 'lok_penyimpanan', 'tipe_box', 'nama_wp', 'npwp', 'nopd', 'email', 'tgllahir', 'alamat', 'notlp_petugas', 'jabatan', 'jenis_kelamin'];

    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM laporan_arsip ORDER BY idarsp ASC");
        return $query->getResult();
    }

    public function getLaporanById($idla)
    {
        return $this->find($idla);
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

    public function updateLap($idla, $data)
    {
        $this->update($idla, $data);
    }
    
    public function getPaginatedData($limit, $offset, $search = null)
    {
        $builder = $this->builder();

        if ($search) {
            $builder->like('idarsp', $search)
                    ->orLike('judul_arsp', $search)
                    ->orLike('kat_arsp', $search)
                    ->orLike('nama_wajib_pajak', $search)
                    ->orLike('npwp', $search)
                    ->orLike('nopd', $search)
                    ->orLike('email', $search)
                    ->orLike('alamat', $search)
                    ->orLike('nama_petugas', $search)
                    ->orLike('jabatan', $search)
                    ->orLike('tgl_pembuatan', $search)
                    ->orLike('lok_penyimpanan', $search)
                    ->orLike('tipe_box', $search)
                    ->orLike('status_arsp', $search);
        }

        return [
            'data' => $builder->get($limit, $offset)->getResult(),
            'total' => $builder->countAllResults(false)
        ];
    }

}