<?php

class Booking{
    private $conn;
    private $table = 'Booking';

    public $id;
    public $userId;
    public $seatId;
    public $eventId;
    public $paymentTerms;
    public $userName;
    public $userSurname;
    public $seatNo;
    public $seatRow;
    public $seatSection;
    public $eventName;
    public $eventDate;
    public $eventTime;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting Bookings from database
    public function readBookings(){

        // Read Query
        $query = 'SELECT b.id, u.name AS userName, u.surname AS userSurname, s.seatNo AS seatNo, 
                s.seatRow AS seatRow, s.seatSection AS seatSection, e.eventName AS eventName, 
                e.eventDate AS eventDate, e.eventTime AS eventTime, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN users u on u.id = b.userId
                JOIN seat s ON s.id = b.seatId
                JOIN events e ON e.id = b.eventId 
                JOIN paymentTerms p ON p.id = b.paymentTerms ;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Booking from database by Id
    public function getBookingById(){

        // Read Query
        $query = 'SELECT b.id, u.name AS userName, u.surname AS userSurname, s.seatNo AS seatNo, 
                s.seatRow AS seatRow, s.seatSection AS seatSection, e.eventName AS eventName, 
                e.eventDate AS eventDate, e.eventTime AS eventTime, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN users u on u.id = b.userId
                JOIN seat s ON s.id = b.seatId
                JOIN events e ON e.id = b.eventId 
                JOIN paymentTerms p ON p.id = b.paymentTerms
                WHERE b.id = ? LIMIT 1;';

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
            $this->userName = $row['userName'];
            $this->userSurname = $row['userSurname'];
            $this->seatNo = $row['seatNo'];
            $this->seatRow = $row['seatRow'];
            $this->seatSection = $row['seatSection'];
            $this->eventName = $row['eventName'];
            $this->eventDate = $row['eventDate'];
            $this->eventTime = $row['eventTime'];
            $this->paymentTerms = $row['paymentTerms'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Bookings from database by eventId
    public function getBookingsByEventId(){

        // Read Query
        $query = 'SELECT b.id, u.name AS userName, u.surname AS userSurname, s.seatNo AS seatNo, 
                s.seatRow AS seatRow, s.seatSection AS seatSection, e.eventName AS eventName, 
                e.eventDate AS eventDate, e.eventTime AS eventTime, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN users u on u.id = b.userId
                JOIN seat s ON s.id = b.seatId
                JOIN events e ON e.id = b.eventId 
                JOIN paymentTerms p ON p.id = b.paymentTerms
                WHERE b.eventId = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->eventId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Bookings from database by eventId
    public function getBookingsByUserId(){

        // Read Query
        $query = 'SELECT b.id, u.name AS userName, u.surname AS userSurname, s.seatNo AS seatNo, 
                s.seatRow AS seatRow, s.seatSection AS seatSection, e.eventName AS eventName, 
                e.eventDate AS eventDate, e.eventTime AS eventTime, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN users u on u.id = b.userId
                JOIN seat s ON s.id = b.seatId
                JOIN events e ON e.id = b.eventId 
                JOIN paymentTerms p ON p.id = b.paymentTerms
                WHERE b.userId = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->userId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Creating New UserBooking
    public function createBooking(){
        $query = 'INSERT INTO '.$this->table.'
            (userId, seatId, eventId, paymentTerms)
            VALUES(:userId, :seatId, :eventId, :paymentTerms);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->seatId = htmlspecialchars(strip_tags($this->seatId));
        $this->eventId = htmlspecialchars(strip_tags($this->eventId));
        $this->paymentTerms = htmlspecialchars(strip_tags($this->paymentTerms));

        // bind parameters to request
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':seatId', $this->seatId);
        $stmt->bindParam(':eventId', $this->eventId);
        $stmt->bindParam(':paymentTerms', $this->paymentTerms);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }

    // Updating Single Booking by the ID
    public function updateBooking(){
        $query = 'UPDATE '.$this->table.'
                    SET userId = :userId,
                        seatId = :seatId,
                        eventId = :eventId,
                        paymentTerms = :paymentTerms
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->seatId = htmlspecialchars(strip_tags($this->seatId));
        $this->eventId = htmlspecialchars(strip_tags($this->eventId));
        $this->paymentTerms = htmlspecialchars(strip_tags($this->paymentTerms));
        
        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':seatId', $this->seatId);
        $stmt->bindParam(':eventId', $this->eventId);
        $stmt->bindParam(':paymentTerms', $this->paymentTerms);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    public function deleteBooking(){
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