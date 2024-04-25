<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../../core/initialize.php');

// Create instance of PaymentTerms
$paymentTerms = new PaymentTerms($db);

$data = json_decode(file_get_contents('php://input'));

$paymentTerms->name = $data->name;

if($paymentTerms->createPaymentTerms()){
    echo json_encode(array('message' => 'Payment Terms created.'));
}
else{
    echo json_encode(array('message' => 'Payment Terms not created.'));
}