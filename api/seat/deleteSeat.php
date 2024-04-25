<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of Seat
$seat = new Seat($db);

$seat->id = isset($_GET['id']) ? $_GET['id'] : die();

if($seat->deleteSeat()){
    echo json_encode(array('message' => 'Seat deleted.'));
}
else{
    echo json_encode(array('message' => 'Seat not deleted.'));
}