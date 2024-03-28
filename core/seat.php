<?php

class Seat{
    private $conn;
    private $table = 'Seat';

    public $id;
    public $seatNo;
    public $seatRow;
    public $seatSection;
    public $venuePrice;

    public function __construct($db){
        $this->conn = $db;
    }
}