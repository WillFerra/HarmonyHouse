<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../core/initialize.php');

// Create an instance of role
$role = new Role($db);

$data = json_decode(file_get_contents('php://input'));

$role->id = $data->id;
$role->name = $data->name;

if($role->updateRole()){
    echo json_encode(array('message' => 'Role updated.'));
}
else{
    echo json_encode(array('message' => 'Role not updated.'));
}