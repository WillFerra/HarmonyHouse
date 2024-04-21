<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of PaymentTerms
$paymentTerms = new PaymentTerms($db);

$paymentTerms->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $paymentTerms-> getPaymentTermsById();

if($result!==false){
    $paymentTerms_info = array(
        'id'    => $paymentTerms->id,
        'name'  => $paymentTerms->name
    );

    print_r(json_encode($paymentTerms_info));
}