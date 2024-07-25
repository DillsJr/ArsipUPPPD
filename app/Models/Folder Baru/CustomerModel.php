<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = "customer";
    protected $primaryKey = "cid";
    protected $returnType = "object";
    protected $allowedFields = ['cid', 'cname', 'alamat', 'email', 'phone'];
}

?>