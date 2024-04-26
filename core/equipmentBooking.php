<?php

class EquipmentBooking{
    private $conn;
    private $table = 'EquipmentBooking';

    public $id;
    public $eventId;
    public $equipmentId;
    public $bookingId;
    public $paymentTerms;
    public $eventName;
    public $eventDate;
    public $eventTime;
    public $equipmentName;
    public $serialNo;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting Equipment Bookings from database
    public function readEquipmentBookings(){

        // Read Query
        $query = 'SELECT b.id, e.eventName AS eventName, e.eventDate AS eventDate, 
                e.eventTime AS eventTime, q.name AS equipmentName, q.serialNo AS serialNo, 
                b.bookingId, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN events e ON e.id = b.eventId 
                JOIN equipment q ON q.id = b.equipmentId
                JOIN paymentTerms p ON p.id = b.paymentTerms ;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Booking from database by Id
    public function getEquipBookingById(){

        // Read Query
        $query = 'SELECT b.id, e.eventName AS eventName, e.eventDate AS eventDate, 
                e.eventTime AS eventTime, q.name AS equipmentName, q.serialNo AS serialNo, 
                b.bookingId, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN events e ON e.id = b.eventId 
                JOIN equipment q ON q.id = b.equipmentId
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
            $this->eventName = $row['eventName'];
            $this->eventDate = $row['eventDate'];
            $this->eventTime = $row['eventTime'];
            $this->equipmentName = $row['equipmentName'];
            $this->serialNo = $row['serialNo'];
            $this->bookingId = $row['bookingId'];
            $this->paymentTerms = $row['paymentTerms'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Equipment from database by EventId
    public function getEquipBookingByEventId(){

        // Read Query
        $query = 'SELECT b.id, e.eventName AS eventName, e.eventDate AS eventDate, 
                e.eventTime AS eventTime, q.name AS equipmentName, q.serialNo AS serialNo, 
                b.bookingId, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN events e ON e.id = b.eventId 
                JOIN equipment q ON q.id = b.equipmentId
                JOIN paymentTerms p ON p.id = b.paymentTerms
        WHERE b.eventId like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->eventId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Equipment from database by EventId
    public function getEquipBookingByEquipId(){

        // Read Query
        $query = 'SELECT b.id, e.eventName AS eventName, e.eventDate AS eventDate, 
                e.eventTime AS eventTime, q.name AS equipmentName, q.serialNo AS serialNo, 
                b.bookingId, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN events e ON e.id = b.eventId 
                JOIN equipment q ON q.id = b.equipmentId
                JOIN paymentTerms p ON p.id = b.paymentTerms
        WHERE b.equipmentId like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->equipmentId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Equipment from database by BookingId
    public function getEquipBookingByBookingId(){

        // Read Query
        $query = 'SELECT b.id, e.eventName AS eventName, e.eventDate AS eventDate, 
                e.eventTime AS eventTime, q.name AS equipmentName, q.serialNo AS serialNo, 
                b.bookingId, p.name AS paymentTerms
                FROM ' .$this->table. ' b
                JOIN events e ON e.id = b.eventId 
                JOIN equipment q ON q.id = b.equipmentId
                JOIN paymentTerms p ON p.id = b.paymentTerms
        WHERE b.bookingId like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->bookingId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Creating New Equipment Booking
    public function createEquipBooking(){
        $query = 'INSERT INTO '.$this->table.'
            (eventId, equipmentId, bookingId, paymentTerms)
            VALUES(:eventId, :equipmentId, :bookingId, :paymentTerms);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->eventId = htmlspecialchars(strip_tags($this->eventId));
        $this->equipmentId = htmlspecialchars(strip_tags($this->equipmentId));
        $this->bookingId = htmlspecialchars(strip_tags($this->bookingId));
        $this->paymentTerms = htmlspecialchars(strip_tags($this->paymentTerms));

        // bind parameters to request
        $stmt->bindParam(':eventId', $this->eventId);
        $stmt->bindParam(':equipmentId', $this->equipmentId);
        $stmt->bindParam(':bookingId', $this->bookingId);
        $stmt->bindParam(':paymentTerms', $this->paymentTerms);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }

    // Updating Equipment Booking by the ID
    public function updateEquipBooking(){
        $query = 'UPDATE '.$this->table.'
                    SET eventId = :eventId,
                        equipmentId = :equipmentId,
                        bookingId = :bookingId,
                        paymentTerms = :paymentTerms
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->eventId = htmlspecialchars(strip_tags($this->eventId));
        $this->equipmentId = htmlspecialchars(strip_tags($this->equipmentId));
        $this->bookingId = htmlspecialchars(strip_tags($this->bookingId));
        $this->paymentTerms = htmlspecialchars(strip_tags($this->paymentTerms));
        
        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':eventId', $this->eventId);
        $stmt->bindParam(':equipmentId', $this->equipmentId);
        $stmt->bindParam(':bookingId', $this->bookingId);
        $stmt->bindParam(':paymentTerms', $this->paymentTerms);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    public function deleteEquipBooking(){
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