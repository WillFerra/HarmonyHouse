<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../../core/initialize.php');

// Create instance of status
$status = new Status($db);

$data = json_decode(file_get_contents('php://input'));

$status->name = $data->name;

if($status->createStatus()){
    echo json_encode(array('message' => 'Status created.'));
}
else{
    echo json_encode(array('message' => 'Status not created.'));
}