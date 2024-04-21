<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../core/initialize.php');

// Create instance of Equipment
$equipment = new Equipment($db);

$data = json_decode(file_get_contents('php://input'));

$equipment->name = $data->name;
$equipment->price = $data->price;
$equipment->serialNo = $data->serialNo;


if($equipment->createEquipment()){
    echo json_encode(array('message' => 'Equipment created.'));
}
else{
    echo json_encode(array('message' => 'Equipment not created.'));
}