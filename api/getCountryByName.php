<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of Country
$country = new Country($db);

$country->name = isset($_GET['name']) ? $_GET['name'] : die();
$result = $country-> getCountryByName();

$num = $result->rowCount();

if($num > 0){
    $country_list = array();
    $country_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $country_item = array(
            'id'   => $id,
            'name' => $name
        );
        // add current user into list
        array_push($country_list['data'], $country_item);
    }
    echo json_encode($country_list);
}
else{
    echo json_encode(array('message'=>'No Countries found.'));
}



