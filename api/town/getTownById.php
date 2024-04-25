<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of town
$town = new Town($db);

$town->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $town-> getTownById();

if($result!==false){
    $town_info = array(
        'id'            => $town->id,
        'name'          => $town->name,
        'country'       => $town->countryName,
    );

    print_r(json_encode($town_info));
}