<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Booking
$booking = new Booking($db);

$booking->userId = isset($_GET['userId']) ? $_GET['userId'] : die();
$result = $booking->getBookingsByUserId();

$num = $result->rowCount();

if($num > 0){
    $booking_list = array();
    $booking_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $booking_item = array(
            'id'                => $id,
            'name'              => $userName,
            'surname'           => $userSurname,
            'seat'              => $seatNo,
            'seatRow'           => $seatRow,
            'seatSection'       => $seatSection,
            'eventName'         => $eventName,
            'eventTime'         => $eventTime,
            'paymentTerms'      => $paymentTerms
        );
        // add current booking into list
        array_push($booking_list['data'], $booking_item);
    }
    echo json_encode($booking_list);
}
else{
    echo json_encode(array('message'=>'No Bookings found.'));
}



