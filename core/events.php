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

    // Getting Single Event from database
    public function getEventById(){

        // Read Query
        // $query = 'SELECT * FROM '.$this->table. ' u WHERE u.id = ? LIMIT 1';

        // Read Query
        $query = 'SELECT e.id, e.eventName, e.eventTime, e.eventStatus, e.organiserPrice,
            u.name
                    FROM ' .$this->table. ' e
                    JOIN users u ON u.id = e.user WHERE e.user = ? LIMIT 1;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->id);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->eventName = $row['eventName'];
        $this->eventDate = $row['eventDate'];
        $this->eventTime = $row['eventTime'];
        $this->eventStatus = $row['eventStatus'];
        $this->organiserPrice = $row['organiserPrice'];
        $this->name = $row['name'];
        $this->paymentTerms = $row['paymentTerms'];

        return $stmt;
    }
}