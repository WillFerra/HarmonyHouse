<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of User
$user = new users($db);

$user->roleId = isset($_GET['roleId']) ? $_GET['roleId'] : die();
$result = $user-> getUserByRole();

$num = $result->rowCount();

if($num > 0){
    $user = array();
    $user_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_item = array(
            'id'         => $id,
            'name'       => $name,
            'surname'    => $surname,
            'address'    => $address,
            'street'     => $streetName,
            'role'       => $role,
            'email'      => $email,
            'password'   => $password,
            'notifications' => $notifications,
        );
        // add current user into list
        array_push($user_list['data'], $user_item);
    }
    echo json_encode($user_list);
}
else{
    echo json_encode(array('message'=>'No Users found.'));
}



