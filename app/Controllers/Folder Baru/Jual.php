<?php

namespace App\Controllers;

class Jual extends BaseController
{
    public function content1()
    {
        return view('header_pro')
            . view('content1')
            . view('footer_pro');
    }
    public function content2()
    {
        return view('header_pro')
            . view('content2')
            . view('footer_pro');
    }
}
?>