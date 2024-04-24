<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of PaymentDetails
$paymentDetails = new PaymentDetails($db);

$paymentDetails->holderName = isset($_GET['holderName']) ? $_GET['holderName'] : die();
$result = $paymentDetails-> getPaymentDetailsByHolderName();

$num = $result->rowCount();

if($num > 0){
    $paymentDetails = array();
    $paymentDetails_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $paymentDetails_item = array(
            'id'            => $id,
            'cardNo'        => $cardNo,
            'bank'          => $bankName,
            'expDate'       => $expDate,
            'cvv'           => $cvv,
            'holderName'    => $holderName,
        );
        // add current paymentDetails into list
        array_push($paymentDetails_list['data'], $paymentDetails_item);
    }
    echo json_encode($paymentDetails_list);
}
else{
    echo json_encode(array('message'=>'No Account Holder found.'));
}



