<?php

class Equipment{
    private $conn;
    private $table = 'Equipment';

    public $id;
    public $name;
    public $price;
    public $serialNo;

    public function __construct($db){
        $this->conn = $db;
    }
}