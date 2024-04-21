<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of Equipment
$equipment = new Equipment($db);

// Call a function from equipment instance
$result = $equipment->readEquipment();

$num = $result->rowCount();

if($num > 0){
    $equipment_list = array();
    $equipment_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $equipment_item = array(
            'id'        => $id,
            'name'      => $name,
            'price'     => $price,
            'serialNo'  => $serialNo
        );
        // add current user into list
        array_push($equipment_list['data'], $equipment_item);
    }
    echo json_encode($equipment_list);
}
else{
    echo json_encode(array('message'=>'No Equipment found.'));
}
