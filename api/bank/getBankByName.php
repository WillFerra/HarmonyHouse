<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of bank
$bank = new Bank($db);

$bank->name = isset($_GET['name']) ? $_GET['name'] : die();
$result = $bank-> getBankByName();

$num = $result->rowCount();

if($num > 0){
    $bank_list = array();
    $bank_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $bank_item = array(
            'id'   => $id,
            'name' => $name
        );
        // add current user into list
        array_push($bank_list['data'], $bank_item);
    }
    echo json_encode($bank_list);
}
else{
    echo json_encode(array('message'=>'No Banks found.'));
}



