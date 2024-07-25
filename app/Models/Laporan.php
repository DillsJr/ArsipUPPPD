<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\DataArsipModel; // Tambahkan model arsip
use App\Models\DataPetugasModel;
use CodeIgniter\API\ResponseTrait;

class Laporan extends BaseController
{
    use ResponseTrait;

    protected $lprn;
    protected $arsp; // Deklarasikan model arsip
    protected $ptgs; // Deklarasikan model petugas

    public function __construct()
    {
        $this->lprn = new LaporanModel();
        $this->arsp = new DataArsipModel(); // Inisialisasi model arsip
        $this->ptgs = new DataPetugasModel(); // Inisialisasi model petugas
    }

    public function index()
    {
        $arsip = $this->arsp->findAll(); // Ambil semua data arsip dari tabel arsip
        $petugas = $this->ptgs->findAll(); // Ambil semua data petugas dari tabel petugas
        $getdata = $this->lprn->getdata();
        $data = array(
            'laporan' => $getdata,
            'arsip' => $arsip, // Kirim data arsip ke tampilan
            'petugas' => $petugas // Kirim data petugas ke tampilan
        );

        return view('LaporanData', $data);
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

        return view('LaporanData', $data);
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