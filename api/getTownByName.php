<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of Town
$town = new Town($db);

$town->name = isset($_GET['name']) ? $_GET['name'] : die();
$result = $town-> getTownByName();

$num = $result->rowCount();

if($num > 0){
    $town = array();
    $town_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $town_item = array(
            'id'            => $id,
            'name'          => $name,
            'countryName'   => $countryName,
        );
        // add current user into list
        array_push($town_list['data'], $town_item);
    }
    echo json_encode($town_list);
}
else{
    echo json_encode(array('message'=>'No Towns found.'));
}



