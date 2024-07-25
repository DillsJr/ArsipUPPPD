<?php

namespace App\Models;

use CodeIgniter\Model;
    
class Country_Model extends Model
{
    protected $table = 'country';
    protected $primaryKey = 'country_id';
    protected $returnType = 'object';
    protected $allowedFields = ['country_id', 'country_name'];
}
?>