<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../core/initialize.php');

// Create an instance of status
$status = new Status($db);

$data = json_decode(file_get_contents('php://input'));

$status->id = $data->id;
$status->name = $data->name;

if($status->updateStatus()){
    echo json_encode(array('message' => 'Status updated.'));
}
else{
    echo json_encode(array('message' => 'Status not updated.'));
}