<?php

class Country{
    private $conn;
    private $table = 'Country';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
}