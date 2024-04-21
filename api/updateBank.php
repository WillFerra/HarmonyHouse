<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../core/initialize.php');

// Create an instance of Bank
$bank = new Bank($db);

$data = json_decode(file_get_contents('php://input'));

$bank->id = $data->id;
$bank->name = $data->name;

if($bank->updateBank()){
    echo json_encode(array('message' => 'Bank updated.'));
}
else{
    echo json_encode(array('message' => 'Bank not updated.'));
}