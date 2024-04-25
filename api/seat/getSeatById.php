<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Seat
$seat = new Seat($db);

$seat->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $seat-> getSeatById();

if($result!==false){
    $user_info = array(
        'id'            => $seat->id,
        'seatNo'        => $seat->seatNo,
        'setRow'        => $seat->seatRow,
        'section'       => $seat->section,
        'venuePrice'    => $seat->venuePrice
    );

    print_r(json_encode($user_info));
}



