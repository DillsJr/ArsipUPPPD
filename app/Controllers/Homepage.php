<?php
namespace App\Controllers;
class Homepage extends BaseController
{
    public function index()
    {
        echo view('Pages/Header');
        echo view('Pages/Topbar');
        echo view('Pages/Sidebar');
        echo view('Homepage');
        echo view('Pages/Footer');
    }
}