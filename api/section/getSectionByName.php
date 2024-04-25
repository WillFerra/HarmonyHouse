<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../../core/initialize.php');

// Create an instance of Section
$section = new Section($db);

$section->name = isset($_GET['name']) ? $_GET['name'] : die();
$result = $section-> getSectionByName();

$num = $result->rowCount();

if($num > 0){
    $section_list = array();
    $section_list['data'] = array();

    // while more rows exist, get next row
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $section_item = array(
            'id'   => $id,
            'name' => $name
        );
        // add current user into list
        array_push($section_list['data'], $section_item);
    }
    echo json_encode($section_list);
}
else{
    echo json_encode(array('message'=>'No Sections found.'));
}



