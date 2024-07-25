<?php

namespace App\Models;

use CodeIgniter\Model;

class TransModel extends Model
{
    protected $table = "transh";
    protected $primaryKey = "cid";
    protected $returnType = "object";
    protected $allowedFields = ['transno', 'trans_date', 'cid'];
}

?>