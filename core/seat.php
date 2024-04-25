<?php

class Seat{
    private $conn;
    private $table = 'Seat';

    public $id;
    public $seatNo;
    public $seatRow;
    public $seatSection;
    public $venuePrice;
    public $section;

    public function __construct($db){
        $this->conn = $db;
    }
    
    // Getting Seats from database
    public function readSeats(){

        // Read Query
        $query = 'SELECT s.id, s.seatNo, s.seatRow, d.name AS section, s.venuePrice
                FROM ' .$this->table. ' s
                JOIN section d ON d.id = s.seatSection;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single Seat from database by Id
    public function getSeatById(){

        // Read Query
        $query = 'SELECT s.id, s.seatNo, s.seatRow, d.name AS section, s.venuePrice
                FROM ' .$this->table. ' s
                JOIN section d ON d.id = s.seatSection
                WHERE s.id = ? LIMIT 1;';

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
            $this->seatNo = $row['seatNo'];
            $this->seatRow = $row['seatRow'];
            $this->section = $row['section'];
            $this->venuePrice = $row['venuePrice'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Seats from database by seatNo
    public function getSeatByNo(){

        // Read Query
        $query = 'SELECT s.id, s.seatNo, s.seatRow, d.name AS section, s.venuePrice 
                FROM ' .$this->table. ' s 
                JOIN section d ON d.id = s.seatSection
                WHERE s.seatNo = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->seatNo);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Seats from database by seatRow
    public function getSeatByRow(){

        // Read Query
        $query = 'SELECT s.id, s.seatNo, s.seatRow, d.name AS section, s.venuePrice 
                FROM ' .$this->table. ' s 
                JOIN section d ON d.id = s.seatSection
                WHERE s.seatRow = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->seatRow);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Seat from database by Section
    public function getSeatBySection(){

        // Read Query
        $query = 'SELECT s.id, s.seatNo, s.seatRow, d.name AS section, s.venuePrice 
                FROM ' .$this->table. ' s 
                JOIN section d ON d.id = s.seatSection
                WHERE s.seatSection = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->seatSection);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Creating New Seat
    public function createSeat(){
        $query = 'INSERT INTO '.$this->table.'
            (seatNo, seatRow, seatSection, venuePrice)
            VALUES(:seatNo, :seatRow, :seatSection, :venuePrice);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->seatNo = htmlspecialchars(strip_tags($this->seatNo));
        $this->seatRow = htmlspecialchars(strip_tags($this->seatRow));
        $this->seatSection = htmlspecialchars(strip_tags($this->seatSection));
        $this->venuePrice = htmlspecialchars(strip_tags($this->venuePrice));

        // bind parameters to request
        $stmt->bindParam(':seatNo', $this->seatNo);
        $stmt->bindParam(':seatRow', $this->seatRow);
        $stmt->bindParam(':seatSection', $this->seatSection);
        $stmt->bindParam(':venuePrice', $this->venuePrice);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }
}