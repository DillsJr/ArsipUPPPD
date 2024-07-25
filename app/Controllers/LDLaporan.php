<?php

namespace App\Controllers;

use App\Models\LDLaporanModel;
use App\Models\ADDataArsipModel; // Tambahkan model arsip
use App\Models\ADDataPetugasModel;
use CodeIgniter\API\ResponseTrait;

class LDLaporan extends BaseController
{
    use ResponseTrait;

    protected $lprn;
    protected $arsp; // Deklarasikan model arsip
    protected $ptgs; // Deklarasikan model petugas

    public function __construct()
    {
        $this->lprn = new LDLaporanModel();
        $this->arsp = new ADDataArsipModel(); // Inisialisasi model arsip
        $this->ptgs = new ADDataPetugasModel(); // Inisialisasi model petugas
    }

    public function index()
    {
        $search = $this->request->getVar('search');
        $page = $this->request->getVar('page') ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $arsip = $this->arsp->findAll();
        $petugas = $this->ptgs->findAll();

        $result = $this->lprn->getPaginatedData($limit, $offset, $search); // Pass the $search parameter
        $data = [
            'arsip' => $arsip,
            'petugas' => $petugas,
            'laporan_arsip' => $result['data'],
            'total' => $result['total'],
            'limit' => $limit,
            'currentPage' => $page,
            'search' => $search,
        ];

        return view('LDLaporanData', $data);
    }

    public function detail($idlprn)
    {
        $laporan = $this->lprn->find($idlprn); // Ambil detail laporan
        $arsip = $this->arsp->find($laporan['idarsp']); // Ambil detail arsip berdasarkan idarsp
        $petugas = $this->ptgs->find($laporan['idptgs']); // Ambil detail petugas berdasarkan idptgs
        // Gabungkan data laporan, petugas dan data arsip menjadi satu array
        $data['laporan'] = $laporan;
        $data['arsip'] = $arsip;
        $data['petugas'] = $petugas;

        return view('LDLaporanData', $data);
    }

}