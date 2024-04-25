<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Seat
$seat = new Seat($db);

$seat->seatRow = isset($_GET['seatRow']) ? $_GET['seatRow'] : die();
$result = $seat-> getSeatByRow();

$num = $result->rowCount();

if($num > 0){
    $seat_list = array();
    $seat_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $seat_item = array(
            'id'            => $id,
            'seatNo'        => $seatNo,
            'seatRow'       => $seatRow,
            'section'       => $section,
            'venuePrice'    => $venuePrice
        );
        // add current user into list
        array_push($seat_list['data'], $seat_item);
    }
    echo json_encode($seat_list);
}
else{
    echo json_encode(array('message'=>'No Seats found.'));
}



