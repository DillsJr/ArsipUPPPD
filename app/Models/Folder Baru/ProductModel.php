<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = "product";
    protected $primaryKey = "pid";
    protected $returnType = "object";
    protected $allowedFields = ['pid', 'pname', 'price'];
}

?>