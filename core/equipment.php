<?php

class Equipment{
    private $conn;
    private $table = 'Equipment';

    public $id;
    public $name;
    public $price;
    public $serialNo;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting All Equipment from database
    public function readEquipment(){

        $query = 'SELECT * FROM ' .$this->table. ' s ORDER BY s.id ASC;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Equipment from database by Id
    public function getEquipmentById(){

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
            $this->price = $row['price'];
            $this->serialNo = $row['serialNo'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Single Equipment from database by Name
    public function getEquipmentByName(){

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

    // Getting Single Equipment from database by SerialNo
    public function getEquipmentBySerialNo(){

        // Read Query
        $query = "SELECT * FROM " .$this->table. " 
                WHERE serialNo like ?;";

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $serialNo = '%' . $this->serialNo . '%';
        $stmt->bindParam(1,$serialNo);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Updating Single Equipment by the ID
    public function updateEquipment(){
        $query = 'UPDATE '.$this->table.'
                    SET name = :name,
                        price = :price,
                        serialNo = :serialNo
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->serialNo = htmlspecialchars(strip_tags($this->serialNo));
        
        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':serialNo', $this->serialNo);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Equipment Name by the ID
    public function updateEquipmentName(){
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

    // Updating Equipment Price by the ID
    public function updateEquipmentPrice(){
        $query = 'UPDATE '.$this->table.'
                    SET price = :price
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->price = htmlspecialchars(strip_tags($this->price));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':price', $this->price);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Equipment SerialNo by the ID
    public function updateEquipmentSerialNo(){
        $query = 'UPDATE '.$this->table.'
                    SET serialNo = :serialNo
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->serialNo = htmlspecialchars(strip_tags($this->serialNo));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':serialNo', $this->serialNo);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Creating New Equipment
    public function createEquipment(){
        $query = 'INSERT INTO '.$this->table.'
            (name, price, serialNo)
            VALUES(:name, :price, :serialNo);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->serialNo = htmlspecialchars(strip_tags($this->serialNo));

        // bind parameters to request
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':serialNo', $this->serialNo);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }

    // Deleting Equipment
    public function deleteEquipment(){
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