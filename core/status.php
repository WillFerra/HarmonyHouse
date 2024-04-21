<?php

class Status{
    private $conn;
    private $table = 'Status';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting All Statuses from database
    public function readStatuses(){

        $query = 'SELECT * FROM ' .$this->table. ' s ORDER BY s.id ASC;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Status from database by Id
    public function getStatusById(){

        // Read Query
        $query = 'SELECT * FROM ' .$this->table. ' WHERE id = ? LIMIT 1;';

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
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Single Status from database by Name
    public function getStatusByName(){

        // Read Query
        $query = "SELECT * FROM " .$this->table. " 
                WHERE name like ?;";

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $name = '%' . $this->name . '%';
        $stmt->bindParam(1,$name);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Updating Status by the ID
    public function updateStatus(){
        $query = 'UPDATE '.$this->table.'
                    SET name = :name
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Creating New Status
    public function createStatus(){
        $query = 'INSERT INTO '.$this->table.'
            (name)
            VALUES(:name);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->name = htmlspecialchars(strip_tags($this->name));

        // bind parameters to request
        $stmt->bindParam(':name', $this->name);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }

    public function deleteStatus(){
        $query = 'DELETE FROM '.$this->table.' WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }
}