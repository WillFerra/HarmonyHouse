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
                WHERE e.eventName like ?;";

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $eventName = '%' . $this->eventName . '%';
        $stmt->bindParam(1,$eventName);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Event from database by Date
    public function getEventByDate(){

        // Read Query
        $query = "SELECT e.id, e.eventName, e.eventDate, e.eventTime, e.organiserPrice, 
        s.name AS status, u.name AS userName, p.name AS payment
                FROM " .$this->table. " e
                JOIN status s ON s.id = e.eventStatus 
                JOIN users u ON u.id = e.user 
                JOIN paymentTerms p ON p.id = e.paymentTerms 
                WHERE e.eventDate like ?;";

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $eventDate = '%' . $this->eventDate . '%';
        $stmt->bindParam(1,$eventDate);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Event from database by User
    public function getEventByUser(){

        // Read Query
        $query = "SELECT e.id, e.eventName, e.eventDate, e.eventTime, e.organiserPrice, 
        s.name AS status, u.name AS userName, p.name AS payment
                FROM " .$this->table. " e
                JOIN status s ON s.id = e.eventStatus 
                JOIN users u ON u.id = e.user 
                JOIN paymentTerms p ON p.id = e.paymentTerms 
                WHERE e.user like ?;";

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $user = '%' . $this->user . '%';
        $stmt->bindParam(1,$user);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Event from database by Statys
    public function getEventByStatus(){

        // Read Query
        $query = "SELECT e.id, e.eventName, e.eventDate, e.eventTime, e.organiserPrice, 
        s.name AS status, u.name AS userName, p.name AS payment
                FROM " .$this->table. " e
                JOIN status s ON s.id = e.eventStatus 
                JOIN users u ON u.id = e.user 
                JOIN paymentTerms p ON p.id = e.paymentTerms 
                WHERE e.eventStatus = ?;";

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->eventStatus);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting All Events from database
    public function readEvents(){

        $query = 'SELECT e.id, e.eventName, e.eventDate, e.eventTime, e.organiserPrice, 
        s.name AS status, u.name AS userName, p.name AS payment
                FROM ' .$this->table. ' e
                JOIN status s ON s.id = e.eventStatus 
                JOIN users u ON u.id = e.user 
                JOIN paymentTerms p ON p.id = e.paymentTerms;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Updating Single Event by the ID
    public function updateEvent(){
        $query = 'UPDATE '.$this->table.'
                    SET eventName = :eventName,
                        eventDate = :eventDate,
                        eventTime = :eventTime,
                        organiserPrice = :organiserPrice,
                        eventStatus = :eventStatus,
                        user = :user,
                        paymentTerms = :paymentTerms
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->eventName = htmlspecialchars(strip_tags($this->eventName));
        $this->eventDate = htmlspecialchars(strip_tags($this->eventDate));
        $this->eventTime = htmlspecialchars(strip_tags($this->eventTime));
        $this->organiserPrice = htmlspecialchars(strip_tags($this->organiserPrice));
        $this->eventStatus = htmlspecialchars(strip_tags($this->eventStatus));
        $this->user = htmlspecialchars(strip_tags($this->user));
        $this->paymentTerms = htmlspecialchars(strip_tags($this->paymentTerms));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':eventName', $this->eventName);
        $stmt->bindParam(':eventDate', $this->eventDate);
        $stmt->bindParam(':eventTime', $this->eventTime);
        $stmt->bindParam(':organiserPrice', $this->organiserPrice);
        $stmt->bindParam(':eventStatus', $this->eventStatus);
        $stmt->bindParam(':user', $this->user);
        $stmt->bindParam(':paymentTerms', $this->paymentTerms);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }
    
    // Updating Event Name
    public function updateEventName(){
        $query = 'UPDATE '.$this->table.'
                    SET eventName = :eventName
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->eventName = htmlspecialchars(strip_tags($this->eventName));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':eventName', $this->eventName);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Event Date
    public function updateEventDate(){
        $query = 'UPDATE '.$this->table.'
                    SET eventDate = :eventDate
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->eventDate = htmlspecialchars(strip_tags($this->eventDate));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':eventDate', $this->eventDate);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Event Time
    public function updateEventTime(){
        $query = 'UPDATE '.$this->table.'
                    SET eventTime = :eventTime
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->eventTime = htmlspecialchars(strip_tags($this->eventTime));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':eventTime', $this->eventTime);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Event Organiser Price
    public function updateEventOrganiserPrice(){
        $query = 'UPDATE '.$this->table.'
                    SET organiserPrice = :organiserPrice
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->organiserPrice = htmlspecialchars(strip_tags($this->organiserPrice));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':organiserPrice', $this->organiserPrice);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating Event Status
    public function updateEventStatus(){
        $query = 'UPDATE '.$this->table.'
                    SET eventStatus = :eventStatus
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->eventStatus = htmlspecialchars(strip_tags($this->eventStatus));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':eventStatus', $this->eventStatus);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Creating New Event
    public function createEvent(){
        $query = 'INSERT INTO '.$this->table.'
            (eventName, eventDate, eventTime, organiserPrice, eventStatus, user, paymentTerms)
            VALUES(:eventName, :eventDate, :eventTime, :organiserPrice, :eventStatus, :user, :paymentTerms);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->eventName = htmlspecialchars(strip_tags($this->eventName));
        $this->eventDate = htmlspecialchars(strip_tags($this->eventDate));
        $this->eventTime = htmlspecialchars(strip_tags($this->eventTime));
        $this->organiserPrice = htmlspecialchars(strip_tags($this->organiserPrice));
        $this->eventStatus = htmlspecialchars(strip_tags($this->eventStatus));
        $this->user = htmlspecialchars(strip_tags($this->user));
        $this->paymentTerms = htmlspecialchars(strip_tags($this->paymentTerms));

        // bind parameters to request
        $stmt->bindParam(':eventName', $this->eventName);
        $stmt->bindParam(':eventDate', $this->eventDate);
        $stmt->bindParam(':eventTime', $this->eventTime);
        $stmt->bindParam(':organiserPrice', $this->organiserPrice);
        $stmt->bindParam(':eventStatus', $this->eventStatus);
        $stmt->bindParam(':user', $this->user);
        $stmt->bindParam(':paymentTerms', $this->paymentTerms);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }
}