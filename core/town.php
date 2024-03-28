<?php

class Town{
    private $conn;
    private $table = 'Town';

    public $id;
    public $name;
    public $countryId;
    
    public function __construct($db){
        $this->conn = $db;
    }
}