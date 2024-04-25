<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Steet
$street = new Street($db);

// Call a function from Street instance
$result = $street->readStreets();

$num = $result->rowCount();

if($num > 0){
    $street_list = array();
    $street_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $street_item = array(
            'id'                => $id,
            'name'              => $name,
            'town'              => $townName,
        );
        // add current town into list
        array_push($street_list['data'], $street_item);
    }
    echo json_encode($street_list);
}
else{
    echo json_encode(array('message'=>'No Streets found.'));
}
