<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of role
$role = new Role($db);

// Call a function from Role instance
$result = $role->readRoles();

$num = $result->rowCount();

if($num > 0){
    $role_list = array();
    $role_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $role_item = array(
            'id'    => $id,
            'name'  => $name
        );
        // add current user into list
        array_push($role_list['data'], $role_item);
    }
    echo json_encode($role_list);
}
else{
    echo json_encode(array('message'=>'No Roles found.'));
}
