<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of seat
$seat = new Seat($db);

$data = json_decode(file_get_contents('php://input'));

$seat->id = $data->id;
$seat->seatNo = $data->seatNo;
$seat->seatRow = $data->seatRow;
$seat->seatSection = $data->seatSection;
$seat->venuePrice = $data->venuePrice;

if($seat->updateSeat()){
    echo json_encode(array('message' => 'Seat updated.'));
}
else{
    echo json_encode(array('message' => 'Seat not updated.'));
}