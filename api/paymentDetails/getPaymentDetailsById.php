<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of PaymentDetails
$paymentDetails = new PaymentDetails($db);

$paymentDetails->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $paymentDetails-> getPaymentDetailsById();

if($result!==false){
    $paymentDetails_info = array(
        'id'    => $paymentDetails->id,
        'cardNo'  => $paymentDetails->cardNo,
        'bankName'  => $paymentDetails->bankName,
        'expDate'  => $paymentDetails->expDate,
        'CVV'  => $paymentDetails->cvv,
        'holderName'  => $paymentDetails->holderName,
    );

    print_r(json_encode($paymentDetails_info));
}