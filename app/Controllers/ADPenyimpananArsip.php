<?php

namespace App\Controllers;

use App\Models\ADPenyimpananArsipModel;
use App\Models\ADDataArsipModel; // Tambahkan model arsip
use CodeIgniter\API\ResponseTrait;

class ADPenyimpananArsip extends BaseController
{
    use ResponseTrait;

    protected $pda;
    protected $arsp; // Deklarasikan model arsip

    public function __construct()
    {
        $this->pda = new ADPenyimpananArsipModel();
        $this->arsp = new ADDataArsipModel(); // Inisialisasi model arsip
    }

    public function index()
    {
        $search = $this->request->getVar('search');
        $page = $this->request->getVar('page') ?? 1;
        $limit = 5; // Sesuaikan dengan jumlah data yang ingin ditampilkan per halaman
        $offset = ($page - 1) * $limit;

        $arsip = $this->arsp->findAll(); // Ambil semua data arsip dari tabel arsip
    
        $result = $this->pda->getPaginatedData($limit, $offset, $search);
        $data = [
            'arsip' => $arsip, // Kirim data arsip ke tampilan
            'penyimpanan_arsip' => $result['data'],
            'total' => $result['total'],
            'limit' => $limit,
            'currentPage' => $page,
            'search' => $search,
        ];
    
        return view('ADPenyimpanan', $data);
    }
    

    public function tambahPDA()
    {
        $data = $this->request->getJSON();
        $this->pda->insert($data);
        return $this->respondCreated(['message' => 'Data Penyimpanan Arsip Berhasil Ditambahkan']);
    }

    public function detail($idpda)
    {
        $penyimpanan_arsip = $this->pda->find($idpda); // Ambil detail penyimpanan arsip
        $arsip = $this->arsp->find($penyimpanan_arsip['idarsp']); // Ambil detail arsip berdasarkan idarsp

        // Gabungkan data penyimpanan arsip dan data arsip menjadi satu array
        $data['penyimpanan_arsip'] = $penyimpanan_arsip;
        $data['arsip'] = $arsip;

        return view('ADPenyimpanan', $data);
    }

    public function editPDA($idpda)
    {
        $data = $this->request->getJSON();
        $this->pda->update($idpda, (array)$data);
        return $this->respond(['message' => 'Data Penyimpanan Arsip Berhasil Diubah']);
    }

    public function hapusPDA($idpda)
    {
        $this->pda->delete($idpda);
        return $this->respondDeleted(['message' => 'Data Penyimpanan Arsip Berhasil Dihapus']);
    }
}