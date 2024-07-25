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
        $limit = 5; // Sesuaikan dengan jumlah data yang ingin ditampilkan per halaman
        $offset = ($page - 1) * $limit;

        $arsip = $this->arsp->findAll(); // Ambil semua data arsip dari tabel arsip
        $petugas = $this->ptgs->findAll(); // Ambil semua data petugas dari tabel petugas

        $result = $this->lprn->getPaginatedData($limit, $offset, $search);
        $data = [
            'arsip' => $arsip, // Kirim data arsip ke tampilan
            'petugas' => $petugas, // Kirim data petugas ke tampilan
            'laporan' => $result['data'],
            'total' => $result['total'],
            'limit' => $limit,
            'currentPage' => $page,
            'search' => $search,
        ];

        return view('LDLaporanData', $data);
    }

    public function tambahLap()
    {
        $data = $this->request->getJSON();
        $this->lprn->insert($data);
        return $this->respondCreated(['message' => 'Data Laporan Berhasil Ditambahkan']);
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

    public function editLap($idlprn)
    {
        $data = $this->request->getJSON();
        $this->lprn->update($idlprn, (array)$data);
        return $this->respond(['message' => 'Data Laporan Berhasil Diubah']);
    }

    public function hapusLap($idlprn)
    {
        $this->lprn->delete($idlprn);
        return $this->respondDeleted(['message' => 'Data Laporan Berhasil Dihapus']);
    }
}