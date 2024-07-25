<?php

namespace App\Controllers;

use App\Models\ADDataArsipModel;
use App\Models\ADDataPetugasModel;
use App\Models\ADDataWPModel;
use CodeIgniter\API\ResponseTrait;

class ADArsip extends BaseController
{
    use ResponseTrait;

    protected $arsp;
    protected $wp; 
    protected $ptgs;

    public function __construct()
    {
        $this->arsp = new ADDataArsipModel();
        $this->wp = new ADDataWPModel();
        $this->ptgs = new ADDataPetugasModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $page = $this->request->getGet('page') ?: 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $paginatedData = $this->arsp->getPaginatedData($limit, $offset, $search);

        $wajibpajak = $this->wp->findAll();
        $petugas = $this->ptgs->findAll();
        $data = [
            'arsip' => $paginatedData['data'],
            'total' => $paginatedData['total'],
            'currentPage' => $page,
            'limit' => $limit,
            'wajibpajak' => $wajibpajak,
            'petugas' => $petugas,
            'search' => $search
        ];

        return view('ADDataArsip', $data);
    }

    public function tambahDA()
    {
        $data = $this->request->getJSON();
        $this->arsp->insert($data);
        return $this->respondCreated(['message' => ' Data Arsip Berhasil Ditambahkan ']);
    }

    public function detail($idarsp)
    {
        $arsip = $this->arsp->find($idarsp); // Ambil detail arsip
        $petugas = $this->ptgs->find($arsip['idptgs']); // Ambil detail petugas berdasarkan idptgs

        // Gabungkan data penyimpanan arsip dan data arsip menjadi satu array
        $data['arsip'] = $arsip;
        $data['petugas'] = $petugas;
        
        return view('ADDataArsip', $data);
    }

    public function editDA($idarsp)
    {
        $data = $this->request->getJSON();
        $this->arsp->update($idarsp, (array)$data);
        return $this->respond(['message' => ' Data Arsip Berhasil Diubah ']);
    }

    public function hapusDA($idarsp)
    {
        $this->arsp->delete($idarsp);
        return $this->respondDeleted(['message' => ' Data Arsip Berhasil Dihapus ']);
    }
}
?>