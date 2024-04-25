<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Event
$user = new users($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $user-> getUserById();

if($result!==false){
    $user_info = array(
        'id'            => $user->id,
        'name'          => $user->name,
        'surname'       => $user->surname,
        'address'       => $user->address,
        'streetName'    => $user->streetName,
        'role'          => $user->role,
    );

    print_r(json_encode($user_info));
}



