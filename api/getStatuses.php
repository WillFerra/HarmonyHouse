<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of User
$status = new Status($db);

// Call a function from Status instance
$result = $status->readStatuses();

$num = $result->rowCount();

if($num > 0){
    $event_list = array();
    $event_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $event_item = array(
            'id'    => $id,
            'name'  => $name
        );
        // add current user into list
        array_push($event_list['data'], $event_item);
    }
    echo json_encode($event_list);
}
else{
    echo json_encode(array('message'=>'No Statuses found.'));
}
