<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../core/initialize.php');

// Create an instance of Town
$town = new Town($db);

$data = json_decode(file_get_contents('php://input'));

$town->id = $data->id;
$town->name = $data->name;
$town->countryId = $data->countryId;

if($town->updateTown()){
    echo json_encode(array('message' => 'Town updated.'));
}
else{
    echo json_encode(array('message' => 'Town not updated.'));
}