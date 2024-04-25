<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Booking
$booking = new Booking($db);

$booking->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $booking-> getBookingById();

if($result!==false){
    $booking_info = array(
        'id'                 => $booking->id,
        'userName'           => $booking->userName,
        'userSurname'        => $booking->userSurname,
        'seatNo'             => $booking->seatNo,
        'seatRow'            => $booking->seatRow,
        'seatSection'        => $booking->seatSection,
        'eventName'          => $booking->eventName,
        'eventDate'          => $booking->eventDate,
        'eventTime'          => $booking->eventTime,
        'paymentTerms'       => $booking->paymentTerms,

    );

    print_r(json_encode($booking_info));
}