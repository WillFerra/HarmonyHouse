<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of Booking
$booking = new Booking($db);

$data = json_decode(file_get_contents('php://input'));

$booking->id = $data->id;
$booking->userId = $data->userId;
$booking->seatId = $data->seatId;
$booking->eventId = $data->eventId;
$booking->paymentTerms = $data->paymentTerms;

if($booking->updateBooking()){
    echo json_encode(array('message' => 'Booking updated.'));
}
else{
    echo json_encode(array('message' => 'Booking not updated.'));
}