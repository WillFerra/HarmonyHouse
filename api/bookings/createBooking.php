<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../../core/initialize.php');

// Create instance of Booking
$booking = new Booking($db);

$data = json_decode(file_get_contents('php://input'));

$booking->userId = $data->userId;
$booking->seatId = $data->seatId;
$booking->eventId = $data->eventId;
$booking->paymentTerms = $data->paymentTerms;

if($booking->createBooking()){
    echo json_encode(array('message' => 'Booking created.'));
}
else{
    echo json_encode(array('message' => 'Booking not created.'));
}