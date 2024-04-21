<?php

class Town{
    private $conn;
    private $table = 'Town';

    public $id;
    public $name;
    public $countryId;
    public $countryName;
    
    public function __construct($db){
        $this->conn = $db;
    }

    // Getting All Towns from database
    public function readTowns(){

        $query = 'SELECT t.id, t.name, c.name AS countryName
            FROM ' .$this->table. ' t 
            JOIN country c on c.id = t.countryId;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Town from database by Id
    public function getTownById(){

        // Read Query
        $query = 'SELECT t.id, t.name, c.name AS countryName
                FROM ' .$this->table. ' t
                JOIN country c ON c.id = t.countryId
                WHERE t.id = ? LIMIT 1;';

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
            $this->countryName = $row['countryName'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Single Town from database by Name
    public function getTownByName(){

        // Read Query
        $query = 'SELECT t.id, t.name, c.name AS countryName
            FROM ' .$this->table. ' t
            JOIN country c ON c.id = t.countryId
        WHERE t.name like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $name = '%' . $this->name . '%';
        $stmt->bindParam(1,$name);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Town from database by CountryId
    public function getTownByCountryId(){

        // Read Query
        $query = 'SELECT t.id, t.name, c.name AS countryName
            FROM ' .$this->table. ' t
            JOIN country c ON c.id = t.countryId
        WHERE t.countryId = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->countryId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Creating New Town
    public function createTown(){
        $query = 'INSERT INTO '.$this->table.'
            (name, countryId)
            VALUES(:name, :countryId);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->countryId = htmlspecialchars(strip_tags($this->countryId));

        // bind parameters to request
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':countryId', $this->countryId);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }

    // Updating Single Town by the ID
    public function updateTown(){
        $query = 'UPDATE '.$this->table.'
                    SET name = :name,
                        countryId = :countryId
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->countryId = htmlspecialchars(strip_tags($this->countryId));
        
        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':countryId', $this->countryId);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Town Name
    public function updateTownName(){
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

    // Updating Town CountryId
    public function updateTownCountryId(){
        $query = 'UPDATE '.$this->table.'
                    SET countryId = :countryId
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->countryId = htmlspecialchars(strip_tags($this->countryId));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':countryId', $this->countryId);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    public function deleteTown(){
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