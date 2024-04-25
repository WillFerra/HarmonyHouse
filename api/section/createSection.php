<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../../core/initialize.php');

// Create instance of section
$section = new Section($db);

$data = json_decode(file_get_contents('php://input'));

$section->name = $data->name;

if($section->createSection()){
    echo json_encode(array('message' => 'Section created.'));
}
else{
    echo json_encode(array('message' => 'Section not created.'));
}