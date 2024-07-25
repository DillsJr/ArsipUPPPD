<?php

namespace App\Models;

use CodeIgniter\Model;

class ADDataWPModel extends Model
{
    protected $table = "wajibpajak";
    protected $primaryKey = "idwp";
    protected $returnType = "object";
    protected $allowedFields = ['idwp', 'nama_wp', 'npwp', 'nopd', 'notelp', 'email', 'alamat'];

    public function getdata()
    {
        // Show Data WP berdasarkan ID
        $query = $this->db->query("SELECT * FROM wajibpajak ORDER BY idwp ASC");

        return $query->getResult();
    }

    public function getWajibPajakById($idwp)
    {
        // Ambil WP berdasarkan ID
        return $this->find($idwp);
    }

    public function updateWP($idwp, $data)
    {
        // Update WP berdasarkan ID
        $this->update($idwp, $data);
    }


    public function hapusWP($idwp)
    {
        // Hapus WP berdasarkan ID
        $this->delete($idwp);
    }

    public function getPaginatedData($limit, $offset, $search = null)
    {
        $builder = $this->builder();

        if ($search) {
            $builder->like('idwp', $search)
                    ->orLike('nama_wp', $search)
                    ->orLike('npwp', $search)
                    ->orLike('nopd', $search)
                    ->orLike('notelp', $search)
                    ->orLike('email', $search)
                    ->orLike('alamat', $search);
        }

        return [
            'data' => $builder->get($limit, $offset)->getResult(),
            'total' => $builder->countAllResults(false)
        ];
    }
}

?>