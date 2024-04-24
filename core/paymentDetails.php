<?php

class PaymentDetails{
    private $conn;
    private $table = 'PaymentDetails';

    public $id;
    public $cardNo;
    public $bankId;
    public $expDate;
    public $cvv;
    public $holderName;
    public $bankName;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting All PaymentDetails from database
    public function readPaymentDetails(){

        $query = 'SELECT * FROM ' .$this->table;

        // Read Query
        $query = 'SELECT p.id, p.cardNo, b.name AS bankName, p.expDate, p.cvv, p.holderName
                FROM ' .$this->table. ' p
                JOIN bank b ON b.id = p.bankId;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Payment Details from database by Id
    public function getPaymentDetailsById(){

        // Read Query
        $query = 'SELECT p.id, p.cardNo, b.name AS bankName, p.expDate, p.cvv, p.holderName
                FROM ' .$this->table. ' p
                JOIN bank b ON b.id = p.bankId
                WHERE p.id = ? LIMIT 1;';

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
            $this->cardNo = $row['cardNo'];
            $this->bankName = $row['bankName'];
            $this->expDate = $row['expDate'];
            $this->cvv = $row['cvv'];
            $this->holderName = $row['holderName'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting PaymentDetails from database by HolderName
    public function getPaymentDetailsByHolderName(){

        // Read Query
        $query = 'SELECT p.id, p.cardNo, b.name AS bankName, p.expDate, p.cvv, p.holderName
            FROM ' .$this->table. ' p
            JOIN bank b ON b.id = p.bankId
            WHERE p.holderName like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $holderName = '%' . $this->holderName . '%';
        $stmt->bindParam(1,$holderName);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Updating PaymentDetails by the ID
    public function updatePaymentDetails(){
        $query = 'UPDATE '.$this->table.'
                    SET cardNo = :cardNo,
                        bankId = :bankId,
                        expDate = :expDate,
                        cvv = :cvv,
                        holderName = :holderName
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->cardNo = htmlspecialchars(strip_tags($this->cardNo));
        $this->bankId = htmlspecialchars(strip_tags($this->bankId));
        $this->expDate = htmlspecialchars(strip_tags($this->expDate));
        $this->cvv = htmlspecialchars(strip_tags($this->cvv));
        $this->holderName = htmlspecialchars(strip_tags($this->holderName));
        
        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':cardNo', $this->cardNo);
        $stmt->bindParam(':bankId', $this->bankId);
        $stmt->bindParam(':expDate', $this->expDate);
        $stmt->bindParam(':cvv', $this->cvv);
        $stmt->bindParam(':holderName', $this->holderName);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Creating New PaymentDetails
    public function createPaymentDetails(){
        $query = 'INSERT INTO '.$this->table.'
            (cardNo, bankId, expDate, cvv, holderName)
            VALUES(:cardNo, :bankId, :expDate, :cvv, :holderName);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->cardNo = htmlspecialchars(strip_tags($this->cardNo));
        $this->bankId = htmlspecialchars(strip_tags($this->bankId));
        $this->expDate = htmlspecialchars(strip_tags($this->expDate));
        $this->cvv = htmlspecialchars(strip_tags($this->cvv));
        $this->holderName = htmlspecialchars(strip_tags($this->holderName));

        // bind parameters to request
        $stmt->bindParam(':cardNo', $this->cardNo);
        $stmt->bindParam(':bankId', $this->bankId);
        $stmt->bindParam(':expDate', $this->expDate);
        $stmt->bindParam(':cvv', $this->cvv);
        $stmt->bindParam(':holderName', $this->holderName);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }
    
    // Deleting Payment Details
    public function deletePaymentDetails(){
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