<?php

namespace App\Controllers;

use App\Models\PTDataWPModel;
use CodeIgniter\API\ResponseTrait;

class PTWajibPajak extends BaseController
{
    use ResponseTrait;

    protected $wp;

    public function __construct()
    {
        $this->wp = new PTDataWPModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $page = $this->request->getGet('page') ?: 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $paginatedData = $this->wp->getPaginatedData($limit, $offset, $search);

        $data = [
            'wajibpajak' => $paginatedData['data'],
            'total' => $paginatedData['total'],
            'currentPage' => $page,
            'limit' => $limit,
            'search' => $search
        ];

        return view('PTDataWajibPajak', $data);
    }

    public function tambahWP()
    {
        // Simpan WP baru
        $data = $this->request->getJSON();
        $this->wp->insert($data);
        return $this->respondCreated(['message' => ' Wajib Pajak Berhasil Ditambahkan ']);
    }


    public function detail($idwp)
    {
        // Ambil data wajib pajak berdasarkan ID
        $data['wajibpajak'] = $this->wp->getWajibPajakById($idwp);

        // Tampilkan view dengan data
        return view('PTDataWajibPajak', $data);
    }

    // Fungsi untuk mengedit data WP
    public function editWP($idwp)
    {
        // Ambil data dari request
        $data = $this->request->getJSON();

        // Update data WP ke database
        $this->wp->update($idwp, (array)$data);

        return $this->respond(['message' => ' Data Wajib Pajak Berhasil Diubah ']);
    }

    // Fungsi untuk menghapus data WP
    public function hapusWP($idwp)
    {
        // Hapus data WP dari database
        $this->wp->delete($idwp);

        return $this->respondDeleted(['message' => ' Data Wajib Pajak Berhasil Dihapus ']);
    }
}