<?php
// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../../core/initialize.php');

// Create instance of PaymentDetails
$paymentDetails = new PaymentDetails($db);

$data = json_decode(file_get_contents('php://input'));

$paymentDetails->cardNo = $data->cardNo;
$paymentDetails->bankId = $data->bankId;
$paymentDetails->expDate = $data->expDate;
$paymentDetails->cvv = $data->cvv;
$paymentDetails->holderName = $data->holderName;

if($paymentDetails->createPaymentDetails()){
    echo json_encode(array('message' => 'Payment Details created.'));
}
else{
    echo json_encode(array('message' => 'Payment Details not created.'));
}