<?php
namespace App\Controllers;
use App\Models\Country_Model;
class Dynamic_dependent extends BaseController
{
function index()
{
    $country = new Country_Model();
    $data["country"] = $country->orderBy('country_name','ASC')->findAll();
    return view("dynamic_dependent",$data);
}
}
?>
