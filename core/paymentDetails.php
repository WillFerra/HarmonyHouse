<?php

class PaymentDetails{
    private $conn;
    private $table = 'PaymentDetails';

    public $id;
    public $cardNo;
    public $bankId;
    public $expDate;
    public $CVV;
    public $holderName

    public function __construct($db){
        $this->conn = $db;
    }
}