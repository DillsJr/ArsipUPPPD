<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $product;

    function __construct()
    {
        $this->product = new ProductModel();
    }

    function TambahData()
    {
        $dt = [
               'pid' => $this->request->getPost('pid'),
               'pname' => $this->request->getPost('pname'),
               'price' => $this->request->getPost('price')
              ];

        $this->product->insert($dt);
        
        $data["x"] = $this->product->findAll();
        return view("showProduct",$data);
    }

    function form_tambahproduct()
    {
        return view ("form-tambahproduct");
    }

    function EditData()
    {
        $dt = [
               'pname' => $this->request->getPost('pname'),
               'price' => $this->request->getPost('price')
              ];

        $pid = $this->request->getPost('pid');
        $this->product->update($pid,$dt);

        $data["x"] = $this->product->findAll();
        return view("showProduct",$data);
    }

    function form_editproduct($id)
    {
        $data["dt"] = $this->product->find($id);
        return view ("form-editproduct" ,$data);
    }

    function ShowData()
    {
        $data ['x'] = $this->product->findAll();
        return view ('showproduct', $data);
    }

    function delete_product($id)
    {
        $this->product->delete($id);
        $data['x'] = $this->product->findAll();
        return view('showproduct', $data);
    }


}
?>