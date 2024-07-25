<?php

namespace App\Controllers;

use App\Models\TaxModel;

class TaxController extends BaseController
{
    public function index()
    {
        $taxModel = new TaxModel();
        $data['taxes'] = $taxModel->getTaxes();
        
        return view('taxes', $data);
    }

    public function add()
    {
        $taxModel = new TaxModel();
        
        if ($this->request->getMethod() === 'post') {
            $taxData = [
                'name' => $this->request->getPost('name'),
                'amount' => $this->request->getPost('amount'),
                'date' => date('Y-m-d')
            ];

            $taxModel->addTax($taxData);
            return redirect()->to('/taxes');
        }

        return view('add_tax');
    }
}
