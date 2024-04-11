<?php

class Users{
    private $conn;
    private $table = 'Users';

    public $id;
    public $name;
    public $surname;
    public $address;
    public $streetId;
    public $roleId;
    public $streetName;
    public $role;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting Users from database
    public function readUsers(){

        // Read Query
        // $query = 'SELECT * FROM '.$this->table.' u ORDER BY u.name ASC;';

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role
                FROM ' .$this->table. ' u
                JOIN street s ON s.id = u.streetId 
                JOIN role r ON r.id = u.roleId ;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}