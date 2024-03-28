<?php

class Booking{
    private $conn;
    private $table = 'Booking';

    public $id;
    public $userId;
    public $seatId;
    public $eventId;
    public $paymentTerms;

    public function __construct($db){
        $this->conn = $db;
    }
}