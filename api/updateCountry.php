<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../core/initialize.php');

// Create an instance of Country
$country = new Country($db);

$data = json_decode(file_get_contents('php://input'));

$country->id = $data->id;
$country->name = $data->name;

if($country->updateCountry()){
    echo json_encode(array('message' => 'Country updated.'));
}
else{
    echo json_encode(array('message' => 'Country not updated.'));
}