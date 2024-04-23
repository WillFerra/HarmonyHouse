<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of street
$street = new Street($db);

$street->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $street-> getStreetById();

if($result!==false){
    $street_info = array(
        'id'            => $street->id,
        'name'          => $street->name,
        'town'          => $street->townName,
    );

    print_r(json_encode($street_info));
}