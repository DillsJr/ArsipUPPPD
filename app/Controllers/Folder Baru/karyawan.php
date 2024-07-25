<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $karyawan;

    function __construct()
    {
        $this->karyawan = new KaryawanModel();
    }

    function TambahKaryawan()
    {
        $dt = [
               'idkaryawan' => $this->request->getPost('idkaryawan'),
               'nama_karyawan' => $this->request->getPost('nama_karyawan'),
               'idjabatan' => $this->request->getPost('idjabatan'),
               'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
               'kota' => $this->request->getPost('kota')
              ];

        $this->karyawan->insert($dt);
        $data["y"] = $this->karyawan->findAll();
        return view("showkaryawan",$data);
    }

    function form_tambahkaryawan()
    {
        return view ("form-tambahkaryawan");
    }

    function EditKaryawan()
    {
        $dt = [
               'nama_karyawan' => $this->request->getPost('nama_karyawan'),
               'idjabatan' => $this->request->getPost('idjabatan'),
               'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
               'kota' => $this->request->getPost('kota')
              ];

        $idkaryawan = $this->request->getPost('idkaryawan');

        $this->karyawan->update($idkaryawan,$dt);
        $data["y"] = $this->karyawan->findAll();
        return view("showkaryawan",$data);
    }

    function form_editkaryawan($id)
    {
        $data["dt"] = $this->karyawan->find($id);
        return view ("form-editkaryawan", $data);
    }

    function ShowKaryawan()
    {
        $data ['y'] = $this->karyawan->findAll();
        return view ('showkaryawan', $data);
    }

    function delete_karyawan($id)
    {
        $this->karyawan->delete($id);
        $data['y'] = $this->karyawan->findAll();
        return view('showkaryawan', $data);
    }
}