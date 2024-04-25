<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Equipment
$equipment = new Equipment($db);

$equipment->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $equipment-> getEquipmentById();

if($result!==false){
    $equipment_info = array(
        'id'        => $equipment->id,
        'name'      => $equipment->name,
        'price'     => $equipment->price,
        'serialNo'  => $equipment->serialNo
    );

    print_r(json_encode($equipment_info));
}



