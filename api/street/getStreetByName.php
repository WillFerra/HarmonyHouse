<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of street
$street = new Street($db);

$street->name = isset($_GET['name']) ? $_GET['name'] : die();
$result = $street-> getStreetByName();

$num = $result->rowCount();

if($num > 0){
    $street = array();
    $street_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $street_item = array(
            'id'            => $id,
            'name'          => $name,
            'townName'      => $townName,
        );
        // add current user into list
        array_push($street_list['data'], $street_item);
    }
    echo json_encode($street_list);
}
else{
    echo json_encode(array('message'=>'No Street found.'));
}



