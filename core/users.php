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

    // Getting Users from database
    public function readUsers(){

        // Read Query
        $query = 'SELECT * FROM '.$this->table.' u ORDER BY u.name ASC;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}