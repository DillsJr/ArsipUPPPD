<?php

namespace App\Controllers;

use App\Models\PTDataArsipModel;
use App\Models\PTDataPetugasModel;
use App\Models\PTDataWPModel;
use CodeIgniter\API\ResponseTrait;

class PTArsip extends BaseController
{
    use ResponseTrait;
    protected $arsp;
    protected $ptgs;
    protected $wp;

    public function __construct()
    {
        $this->arsp = new PTDataArsipModel();
        $this->ptgs = new PTDataPetugasModel();
        $this->wp = new PTDataWPModel();
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
        
        return view('PTDataArsip', $data);
    }


    public function tambahDA()
    {
        // Simpan DA baru
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

        // Tampilkan view dengan data
        return view('PTDataArsip', $data);
    }

    // Fungsi untuk mengedit data DA
    public function editDA($idarsp)
    {
        // Ambil data dari request
        $data = $this->request->getJSON();

        // Update data WP ke database
        $this->arsp->update($idarsp, (array)$data);

        return $this->respond(['message' => ' Data Wajib Pajak Berhasil Diubah ']);
    }

    // Fungsi untuk menghapus data DA
    public function hapusDA($idarsp)
    {
        // Hapus data DA dari database
        $this->arsp->delete($idarsp);

        return $this->respondDeleted(['message' => ' Data Arsip Berhasil Dihapus ']);
    }
}