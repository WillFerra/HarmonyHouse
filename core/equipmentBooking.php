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
}