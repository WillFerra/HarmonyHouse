<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../core/initialize.php');

// Create an instance of Equipment
$equipment = new Equipment($db);

$data = json_decode(file_get_contents('php://input'));

$equipment->id = $data->id;
$equipment->price = $data->price;

if($equipment->updateEquipmentPrice()){
    echo json_encode(array('message' => 'Equipment Price updated.'));
}
else{
    echo json_encode(array('message' => 'Equipment Price not updated.'));
}