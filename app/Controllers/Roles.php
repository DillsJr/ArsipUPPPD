<?php

namespace App\Controllers;

class Roles extends BaseController
{
    public function admin()
    {
        return view('ADHome');
    }

    public function pimpinan()
    {
        return view('LDHome');
    }
    
    public function petugas()
    {
        return view('PTHome');
    }
}
