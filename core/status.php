<?php

class Status{
    private $conn;
    private $table = 'Status';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
}