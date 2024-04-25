<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../../core/initialize.php');

// Create an instance of Role
$role = new Role($db);

$role->id = isset($_GET['id']) ? $_GET['id'] : die();

if($role->deleteRole()){
    echo json_encode(array('message' => 'Role deleted.'));
}
else{
    echo json_encode(array('message' => 'Role not deleted.'));
}