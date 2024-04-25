<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of street
$street = new Street($db);

$data = json_decode(file_get_contents('php://input'));

$street->id = $data->id;
$street->name = $data->name;
$street->townId = $data->townId;

if($street->updateStreet()){
    echo json_encode(array('message' => 'Street updated.'));
}
else{
    echo json_encode(array('message' => 'Street not updated.'));
}