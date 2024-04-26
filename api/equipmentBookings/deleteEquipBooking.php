<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of Equipment Booking
$equipmentBooking = new EquipmentBooking($db);

$equipmentBooking->id = isset($_GET['id']) ? $_GET['id'] : die();

if($equipmentBooking->deleteEquipBooking()){
    echo json_encode(array('message' => 'Equipment Booking deleted.'));
}
else{
    echo json_encode(array('message' => 'Equipment Booking not deleted.'));
}