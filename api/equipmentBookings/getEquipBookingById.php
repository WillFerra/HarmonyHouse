<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of equipmentBooking
$equipmentBooking = new EquipmentBooking($db);

$equipmentBooking->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $equipmentBooking-> getEquipBookingById();

if($result!==false){
    $equipmentBooking_info = array(
        'id'               => $equipmentBooking->id,
        'eventName'        => $equipmentBooking->eventName,
        'eventDate'        => $equipmentBooking->eventDate,
        'eventTime'        => $equipmentBooking->eventTime,
        'equipmentName'    => $equipmentBooking->equipmentName,
        'serialNo'         => $equipmentBooking->serialNo,
        'bookingId'        => $equipmentBooking->bookingId,
        'paymentTerms'     => $equipmentBooking->paymentTerms
    );

    print_r(json_encode($equipmentBooking_info));
}