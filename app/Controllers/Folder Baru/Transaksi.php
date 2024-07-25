<?php

namespace App\Controllers;

use App\Models\TransModel;

class Transaksi extends BaseController
{
    protected $transh;

    function showtransaksi()
    {
        $data ['z'] = $this->transh->findAll();
        return view ('showdatatransaksi', $data);
    }

    function formtransaksi()
    {
        $transh = new TransModel();
        $data["transh"] = $transh->orderBy('cid','ASC')->findAll();
        return view ("form-transaksi");
    }
}