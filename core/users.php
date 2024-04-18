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

    // Getting Single User from database by Id
    public function getUserById(){

        // Read Query
        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role
                FROM ' .$this->table. ' u
                JOIN street s ON s.id = u.streetId 
                JOIN role r ON r.id = u.roleId
                WHERE u.id = ? LIMIT 1;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->id);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($stmt->execute()){
            if($row==null){
                printf('No record found');
                return false;
            }
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->surname = $row['surname'];
            $this->address = $row['address'];
            $this->name = $row['name'];
            $this->name = $row['name'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }
}