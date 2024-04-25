<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of PaymentTerms
$paymentTerms = new PaymentTerms($db);

// Call a function from PaymentTerms instance
$result = $paymentTerms->readPaymentTerms();

$num = $result->rowCount();

if($num > 0){
    $paymentTerms_list = array();
    $paymentTerms_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $paymentTerms_item = array(
            'id'    => $id,
            'name'  => $name
        );
        // add current user into list
        array_push($paymentTerms_list['data'], $paymentTerms_item);
    }
    echo json_encode($paymentTerms_list);
}
else{
    echo json_encode(array('message'=>'No Payment Terms found.'));
}
