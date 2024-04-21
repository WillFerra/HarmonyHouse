<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of status
$status = new Status($db);

$status->name = isset($_GET['name']) ? $_GET['name'] : die();
$result = $status-> getStatusByName();

$num = $result->rowCount();

if($num > 0){
    $status_list = array();
    $status_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $status_item = array(
            'id'   => $id,
            'name' => $name
        );
        // add current user into list
        array_push($status_list['data'], $status_item);
    }
    echo json_encode($status_list);
}
else{
    echo json_encode(array('message'=>'No Statuses found.'));
}



