<?php

namespace App\Controllers;

use App\Models\PTDataPetugasModel;
use CodeIgniter\API\ResponseTrait;

class PTPetugas extends BaseController
{
    use ResponseTrait;

    protected $ptgs;

    public function __construct()
    {
        $this->ptgs = new PTDataPetugasModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $page = $this->request->getGet('page') ?: 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $paginatedData = $this->ptgs->getPaginatedData($limit, $offset, $search);

        $data = [
            'petugas' => $paginatedData['data'],
            'total' => $paginatedData['total'],
            'currentPage' => $page,
            'limit' => $limit,
            'search' => $search
        ];

        return view('PTDataPetugas', $data);
    }

    public function tambahDP()
    {
        // Simpan DP baru
        $data = $this->request->getJSON();
        $this->ptgs->insert($data);
        return $this->respondCreated(['message' => ' Data Petugas Berhasil Ditambahkan ']);
    }


    public function editDP($idptgs)
    {
        // Ambil data dari request
        $data = $this->request->getJSON();

        // Update data DP ke database
        $this->ptgs->update($idptgs, (array)$data);
        
        return $this->respond(['message' => ' Data Petugas Berhasil Diubah ']);
    }

    public function hapusDP($idptgs)
    {
        // Hapus data DP dari database
        $this->ptgs->delete($idptgs);

        return $this->respondDeleted(['message' => ' Data Petugas Berhasil Dihapus ']);
    }

}

?>