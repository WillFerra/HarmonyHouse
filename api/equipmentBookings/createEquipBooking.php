<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../../core/initialize.php');

// Create instance of EquipmentBooking
$equipmentBooking = new EquipmentBooking($db);

$data = json_decode(file_get_contents('php://input'));

$equipmentBooking->eventId = $data->eventId;
$equipmentBooking->equipmentId = $data->equipmentId;
$equipmentBooking->bookingId = $data->bookingId;
$equipmentBooking->paymentTerms = $data->paymentTerms;

if($equipmentBooking->createEquipBooking()){
    echo json_encode(array('message' => 'Equipment Booking created.'));
}
else{
    echo json_encode(array('message' => 'Equipment Booking not created.'));
}