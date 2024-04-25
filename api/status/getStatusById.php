<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Event
$status = new status($db);

$status->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $status-> getStatusById();

if($result!==false){
    $status_info = array(
        'id'    => $status->id,
        'name'  => $status->name
    );

    print_r(json_encode($status_info));
}



