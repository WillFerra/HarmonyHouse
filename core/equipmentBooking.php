<?php

class EquipmentBooking{
    private $conn;
    private $table = 'EquipmentBooking';

    public $id;
    public $eventId;
    public $equipmentId;
    public $bookingId;
    public $paymentTerms;

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
}