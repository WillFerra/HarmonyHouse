<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// initialize API
include_once('../core/initialize.php');

// Create an instance of Section
$section = new Section($db);

$section->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $section-> getSectionById();

if($result!==false){
    $section_info = array(
        'id'    => $section->id,
        'name'  => $section->name
    );

    print_r(json_encode($section_info));
}



