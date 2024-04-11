<?php

class Events{
    private $conn;
    private $table = 'Events';

    public $id;
    public $eventName;
    public $eventDate;
    public $eventTime;
    public $organiserPrice;
    public $eventStatus;
    public $user;
    public $paymentTerms;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting Single Event from database by Id
    public function getEventById(){

        // Read Query
        $query = 'SELECT e.id, e.eventName, e.eventDate, e.eventTime, e.organiserPrice, 
        s.name AS status, u.name AS userName, p.name AS payment
                FROM ' .$this->table. ' e
                JOIN status s ON s.id = e.eventStatus 
                JOIN users u ON u.id = e.user 
                JOIN paymentTerms p ON p.id = e.paymentTerms 
                WHERE e.id = ? LIMIT 1;';

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
            $this->eventName = $row['eventName'];
            $this->eventDate = $row['eventDate'];
            $this->eventTime = $row['eventTime'];
            $this->organiserPrice = $row['organiserPrice'];
            $this->eventStatus = $row['status'];
            $this->name = $row['userName'];
            $this->paymentTerms = $row['payment'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Single Event from database by Name
    public function getEventByName(){

        // Read Query
        $query = "SELECT e.id, e.eventName, e.eventDate, e.eventTime, e.organiserPrice, 
        s.name AS status, u.name AS userName, p.name AS payment
                FROM " .$this->table. " e
                JOIN status s ON s.id = e.eventStatus 
                JOIN users u ON u.id = e.user 
                JOIN paymentTerms p ON p.id = e.paymentTerms 
                WHERE e.eventName like '%?%';";

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->eventName);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($stmt->execute()){
            if($row==null){
                printf('No record found');
                return false;
            }
            $this->eventName = $row['eventName'];
            $this->eventDate = $row['eventDate'];
            $this->eventTime = $row['eventTime'];
            $this->organiserPrice = $row['organiserPrice'];
            $this->eventStatus = $row['status'];
            $this->name = $row['userName'];
            $this->paymentTerms = $row['payment'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }
}