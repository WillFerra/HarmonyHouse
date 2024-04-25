<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Equipment Bookings
$equipmentBooking = new EquipmentBooking($db);

// Call a function from Booking instance
$result = $equipmentBooking->readEquipmentBookings();

$num = $result->rowCount();

if($num > 0){
    $equipmentBooking_list = array();
    $equipmentBooking_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $equipmentBooking_item = array(
            'id'                => $id,
            'eventName'         => $eventName,
            'eventDate'         => $eventDate,
            'eventTime'         => $eventTime,
            'equipmentName'     => $equipmentName,
            'serialNo'          => $serialNo,
            'bookingId'         => $bookingId,
            'paymentTerms'      => $paymentTerms
        );
        // add current user into list
        array_push($equipmentBooking_list['data'], $equipmentBooking_item);
    }
    echo json_encode($equipmentBooking_list);
}
else{
    echo json_encode(array('message'=>'No Equipment Bookings found.'));
}
