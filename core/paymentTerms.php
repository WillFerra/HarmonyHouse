<?php

class PaymentTerms{
    private $conn;
    private $table = 'PaymentTerms';

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }

        // Getting All PaymentTerms from database
        public function readPaymentTerms(){

            $query = 'SELECT * FROM ' .$this->table. ' t ORDER BY t.id ASC;';
    
            // prepare Statement
            $stmt = $this->conn->prepare($query);
    
            // execute query
            $stmt->execute();
    
            return $stmt;
        }
    
        // Getting Single Payment Terms from database by Id
        public function getPaymentTermsById(){
    
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
    
        // Getting Single Payment Terms from database by Name
        public function getPaymentTermsByName(){
    
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
    
        // Updating Payment Terms by the ID
        public function updatePaymentTerms(){
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
    
        // Creating New Payment Term
        public function createPaymentTerms(){
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
        
        // Deleting Payment Terms
        public function deletePaymentTerms(){
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