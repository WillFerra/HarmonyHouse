<?php

class Section{
    private $conn;
    private $table = 'Section';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
}