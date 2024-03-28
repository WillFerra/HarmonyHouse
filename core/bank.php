<?php

class Bank{
    private $conn;
    private $table = 'Bank';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
}