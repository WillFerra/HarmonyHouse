<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of PaymentTerms
$paymentTerms = new PaymentTerms($db);

$data = json_decode(file_get_contents('php://input'));

$paymentTerms->id = $data->id;
$paymentTerms->name = $data->name;

if($paymentTerms->updatePaymentTerms()){
    echo json_encode(array('message' => 'Payment Terms updated.'));
}
else{
    echo json_encode(array('message' => 'Payment Terms not updated.'));
}