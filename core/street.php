<?php

class Street{
    private $conn;
    private $table = 'Street';

    public $id;
    public $name;
    public $townId;
    public $townName;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting All Streets from database
    public function readStreets(){

        $query = 'SELECT s.id, s.name, t.name AS townName
            FROM ' .$this->table. ' s 
            JOIN town t on t.id = s.townId;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Street from database by Id
    public function getStreetById(){

        // Read Query
        $query = 'SELECT s.id, s.name, t.name AS townName
                FROM ' .$this->table. ' s
                JOIN town t ON t.id = s.townId
                WHERE s.id = ? LIMIT 1;';

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
            $this->townName = $row['townName'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Single Street from database by Name
    public function getStreetByName(){

        // Read Query
        $query = 'SELECT s.id, s.name, t.name AS townName
            FROM ' .$this->table. ' s
            JOIN country t ON t.id = s.townId
        WHERE s.name like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $name = '%' . $this->name . '%';
        $stmt->bindParam(1,$name);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Streets from database by townId
    public function getStreetByTownId(){

        // Read Query
        $query = 'SELECT s.id, s.name, t.name AS townName
            FROM ' .$this->table. ' s
            JOIN town t ON t.id = s.townId
        WHERE s.townId = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->townId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Creating New Steet
    public function createStreet(){
        $query = 'INSERT INTO '.$this->table.'
            (name, townId)
            VALUES(:name, :townId);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->townId = htmlspecialchars(strip_tags($this->townId));

        // bind parameters to request
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':townId', $this->townId);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }

    // Updating Single Street by the ID
    public function updateStreet(){
        $query = 'UPDATE '.$this->table.'
                    SET name = :name,
                        townId = :townId
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->townId = htmlspecialchars(strip_tags($this->townId));
        
        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':townId', $this->townId);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Street Name
    public function updateStreetName(){
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

    // Updating Street townId
    public function updateStreetTownId(){
        $query = 'UPDATE '.$this->table.'
                    SET townId = :townId
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->townId = htmlspecialchars(strip_tags($this->townId));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':townId', $this->townId);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Deleting a Steet by the Id
    public function deleteStreet(){
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