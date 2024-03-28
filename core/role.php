<?php

class Role{
    private $conn;
    private $table = 'Role';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
}