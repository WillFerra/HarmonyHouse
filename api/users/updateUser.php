<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of User
$user = new Users($db);

$data = json_decode(file_get_contents('php://input'));

$user->id = $data->id;
$user->name = $data->name;
$user->surname = $data->surname;
$user->address = $data->address;
$user->streetId = $data->streetId;
$user->paymentDetailsId = $data->paymentDetailsId;
$user->roleId = $data->roleId;

if($user->updateUser()){
    echo json_encode(array('message' => 'User updated.'));
}
else{
    echo json_encode(array('message' => 'User not updated.'));
}