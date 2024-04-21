<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of Role
$role = new Role($db);

$role->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $role-> getRoleById();

if($result!==false){
    $role_info = array(
        'id'    => $role->id,
        'name'  => $role->name
    );

    print_r(json_encode($role_info));
}