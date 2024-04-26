<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of Equipment Booking
$equipmentBooking = new EquipmentBooking($db);

$data = json_decode(file_get_contents('php://input'));

$equipmentBooking->id = $data->id;
$equipmentBooking->eventId = $data->eventId;
$equipmentBooking->equipmentId = $data->equipmentId;
$equipmentBooking->bookingId = $data->bookingId;
$equipmentBooking->paymentTerms = $data->paymentTerms;

if($equipmentBooking->updateEquipBooking()){
    echo json_encode(array('message' => 'Equipment Booking updated.'));
}
else{
    echo json_encode(array('message' => 'Equipment Booking not updated.'));
}