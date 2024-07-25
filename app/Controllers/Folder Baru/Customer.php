<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController
{
    protected $customer;

    function __construct()
    {
        $this->customer = new CustomerModel();
    }

    function TambahCustomer()
    {
        $dt = [
               'cid' => $this->request->getPost('cid'),
               'cname' => $this->request->getPost('cname'),
               'alamat' => $this->request->getPost('alamat'),
               'email' => $this->request->getPost('email'),
               'phone' => $this->request->getPost('phone')
              ];

        $this->customer->insert($dt);
        $data["y"] = $this->customer->findAll();
        return view("showcustomer",$data);
    }

    function form_tambahcustomer()
    {
        return view ("form-tambahcustomer");
    }

    function EditCustomer()
    {
        $dt = [
               'cname' => $this->request->getPost('cname'),
               'alamat' => $this->request->getPost('alamat'),
               'email' => $this->request->getPost('email'),
               'phone' => $this->request->getPost('phone')
              ];

        $cid = $this->request->getPost('cid');

        $this->customer->update($cid,$dt);
        $data["y"] = $this->customer->findAll();
        return view("showcustomer",$data);
    }

    function form_editcustomer($id)
    {
        $data["dt"] = $this->customer->find($id);
        return view ("form-editcustomer", $data);
    }

    function ShowCustomer()
    {
        $data ['y'] = $this->customer->findAll();
        return view ('showcustomer', $data);
    }

    function delete_customer($id)
    {
        $this->customer->delete($id);
        $data['y'] = $this->customer->findAll();
        return view('showcustomer', $data);
    }
}