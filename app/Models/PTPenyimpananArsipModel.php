<?php

namespace App\Models;

use CodeIgniter\Model;

class PTPenyimpananArsipModel extends Model
{
    protected $table = "penyimpanan_arsip";
    protected $primaryKey = "idpda";
    protected $returnType = "object";
    protected $allowedFields = ['idpda', 'idarsp', 'kat_arsp', 'lok_penyimpanan', 'tipe_box'];

    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM penyimpanan_arsip ORDER BY idpda ASC");
        return $query->getResult();
    }

    public function getPenyimpananArsipById($idpda)
    {
        return $this->find($idpda);
    }

    public function getAllArsip()
    {
        $query = $this->db->query("SELECT idarsp, kat_arsp FROM arsip ORDER BY idarsp ASC");
        return $query->getResult();
    }

    public function updatePDA($idpda, $data)
    {
        $this->update($idpda, $data);
    }

    public function hapusPDA($idpda)
    {
        $this->delete($idpda);
    }

    public function getPaginatedData($limit, $offset, $search = null)
    {
        $builder = $this->builder();

        if ($search) {
            $builder->like('idpda', $search)
                    ->orLike('idarsp', $search)
                    ->orLike('kat_arsp', $search)
                    ->orLike('lok_penyimpanan', $search)
                    ->orLike('tipe_box', $search);
        }

        return [
            'data' => $builder->get($limit, $offset)->getResult(),
            'total' => $builder->countAllResults(false)
        ];
    }
}