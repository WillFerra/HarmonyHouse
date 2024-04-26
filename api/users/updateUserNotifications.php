<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// initialize API
include_once('../../core/initialize.php');

// Create an instance of User
$user = new Users($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die();

$data = json_decode(file_get_contents('php://input'));

$user->notifications = $data->notifications;

if($user->updateUserNotifications()){
    echo json_encode(array('message' => 'User Notifications updated.'));
}
else{
    echo json_encode(array('message' => 'User Notifications not updated.'));
}