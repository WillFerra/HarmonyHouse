<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of Event
$event = new events($db);

$event->eventName = isset($_GET['eventName']) ? $_GET['eventName'] : die();
$result = $event-> getEventByName();

if($result!==false){
    $event_info = array(
        'id'                => $event->id,
        'eventName'         => $event->eventName,
        'eventDate'         => $event->eventDate,
        'eventTime'         => $event->eventTime,
        'organiserPrice'    => $event->organiserPrice,
        'eventStatus'       => $event->eventStatus,
        'name'              => $event->name,
        'paymentTerms'      => $event->paymentTerms
    );

    print_r(json_encode($event_info));
}



