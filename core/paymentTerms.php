<?php

class PaymentTerms{
    private $conn;
    private $table = 'PaymentTerms';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
}