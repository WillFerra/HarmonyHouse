<?php

class Users{
    private $conn;
    private $table = 'Users';

    public $id;
    public $name;
    public $surname;
    public $address;
    public $streetId;
    public $paymentDetailsId;
    public $roleId;

    public function __construct($db){
        $this->conn = $db;
    }
}