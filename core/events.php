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
    public $userId;
    public $paymentTerms;

    public function __construct($db){
        $this->conn = $db;
    }
}