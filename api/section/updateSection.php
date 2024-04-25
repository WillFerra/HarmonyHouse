<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of Section
$section = new Section($db);

$data = json_decode(file_get_contents('php://input'));

$section->id = $data->id;
$section->name = $data->name;

if($section->updateSection()){
    echo json_encode(array('message' => 'Section updated.'));
}
else{
    echo json_encode(array('message' => 'Section not updated.'));
}