<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Bank
$bank = new Bank($db);

$bank->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $bank-> getBankById();

if($result!==false){
    $bank_info = array(
        'id'    => $bank->id,
        'name'  => $bank->name
    );

    print_r(json_encode($bank_info));
}



