<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of Country
$country = new Country($db);

$country->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $country-> getCountryById();

if($result!==false){
    $country_info = array(
        'id'    => $country->id,
        'name'  => $country->name
    );

    print_r(json_encode($country_info));
}



