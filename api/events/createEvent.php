<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('.../core/initialize.php');

// Create instance of Event
$event = new Events($db);

$data = json_decode(file_get_contents('php://input'));

$event->eventName = $data->eventName;
$event->eventDate = $data->eventDate;
$event->eventTime = $data->eventTime;
$event->organiserPrice = $data->organiserPrice;
$event->eventStatus = $data->eventStatus;
$event->user = $data->user;
$event->paymentTerms = $data->paymentTerms;

if($event->createEvent()){
    echo json_encode(array('message' => 'Event created.'));
}
else{
    echo json_encode(array('message' => 'Event not created.'));
}