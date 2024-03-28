<?php

class Street{
    private $conn;
    private $table = 'Steet';

    public $id;
    public $name;
    public $townId;

    public function __construct($db){
        $this->conn = $db;
    }
}