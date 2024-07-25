<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function pages1()
    {
        return view('lat-header')
            . view('lat-body')
            . view('footer');
    }
    public function pages2()
    {
        return view('lat-header')
            . view('lat-body2')
            . view('footer');
    }
    public function pages3()
    {
        return view('lat-header')
            . view('lat-body3')
            . view('footer');
    }
}
?>