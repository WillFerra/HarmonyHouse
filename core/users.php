<?php

class Users{
    private $conn;
    private $table = 'Users';

    public $id;
    public $name;
    public $surname;
    public $address;
    public $streetId;
    public $roleId;
    public $streetName;
    public $paymentDetailsId;
    public $role;
    public $email;
    public $password;
    public $notifications;

    public function __construct($db){
        $this->conn = $db;
    }

    // Getting Users from database
    public function readUsers(){

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role, 
        u.email, u.password, u.notifications
                FROM ' .$this->table. ' u
                JOIN street s ON s.id = u.streetId 
                JOIN role r ON r.id = u.roleId ;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single User from database by Id
    public function getUserById(){

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role,
        u.email, u.password, u.notifications
                FROM ' .$this->table. ' u
                JOIN street s ON s.id = u.streetId 
                JOIN role r ON r.id = u.roleId
                WHERE u.id = ? LIMIT 1;';

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
            $this->name = $row['name'];
            $this->surname = $row['surname'];
            $this->address = $row['address'];
            $this->streetName = $row['streetName'];
            $this->role = $row['role'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->notifications = $row['notifications'];
            return $stmt;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Getting Single User from database by Name
    public function getUserByName(){

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role,
        u.email, u.password, u.notifications
            FROM ' .$this->table. ' u
            JOIN street s ON s.id = u.streetId 
            JOIN role r ON r.id = u.roleId
        WHERE u.name like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $name = '%' . $this->name . '%';
        $stmt->bindParam(1,$name);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single User from database by Surname
    public function getUserBySurname(){

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role,
        u.email, u.password, u.notifications
            FROM ' .$this->table. ' u
            JOIN street s ON s.id = u.streetId 
            JOIN role r ON r.id = u.roleId
        WHERE u.surname like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $surname = '%' . $this->surname . '%';
        $stmt->bindParam(1,$surname);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    
    // Getting Single User from database by Role
    public function getUserByRole(){

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role,
        u.email, u.password, u.notifications
            FROM ' .$this->table. ' u
            JOIN street s ON s.id = u.streetId 
            JOIN role r ON r.id = u.roleId
        WHERE u.roleId = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->roleId);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Single User from database by Email
    public function getUsersByEmail(){

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role,
        u.email, u.password, u.notifications
            FROM ' .$this->table. ' u
            JOIN street s ON s.id = u.streetId 
            JOIN role r ON r.id = u.roleId
        WHERE u.email like ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $email = '%' . $this->email . '%';
        $stmt->bindParam(1,$email);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Getting Users from database by Notifications
    public function getUserByNotifications(){

        // Read Query
        $query = 'SELECT u.id, u.name, u.surname, u.address, s.name AS streetName, r.name AS role,
        u.email, u.password, u.notifications
            FROM ' .$this->table. ' u
            JOIN street s ON s.id = u.streetId 
            JOIN role r ON r.id = u.roleId
        WHERE u.notifications = ?;';

        // prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind the parameter
        $stmt->bindParam(1,$this->notifications);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Creating New User
    public function createUser(){
        $query = 'INSERT INTO '.$this->table.'
            (name, surname, address, streetId, paymentDetailsId, roleId, email, password, notifications)
            VALUES(:name, :surname, :address, :streetId, :paymentDetailsId, :roleId, :email, :password, :notifications);';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->streetId = htmlspecialchars(strip_tags($this->streetId));
        $this->paymentDetailsId = htmlspecialchars(strip_tags($this->paymentDetailsId));
        $this->roleId = htmlspecialchars(strip_tags($this->roleId));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->notifications = htmlspecialchars(strip_tags($this->notifications));

        // bind parameters to request
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':streetId', $this->streetId);
        $stmt->bindParam(':paymentDetailsId', $this->paymentDetailsId);
        $stmt->bindParam(':roleId', $this->roleId);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':notifications', $this->notifications);

        if ($stmt->execute()){
            return true;
        }

        printf('Error $s. \n', $stmt->error);
        return false;
    }

    // Updating Single User by the ID
    public function updateUser(){
        $query = 'UPDATE '.$this->table.'
                    SET name = :name,
                        surname = :surname,
                        address = :address,
                        streetId = :streetId,
                        paymentDetailsId = :paymentDetailsId,
                        roleId = :roleId,
                        email = :email,
                        password = :password,
                        notifications = :notifications
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->streetId = htmlspecialchars(strip_tags($this->streetId));
        $this->paymentDetailsId = htmlspecialchars(strip_tags($this->paymentDetailsId));
        $this->roleId = htmlspecialchars(strip_tags($this->roleId));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->notifications = htmlspecialchars(strip_tags($this->notifications));
        
        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':streetId', $this->streetId);
        $stmt->bindParam(':paymentDetailsId', $this->paymentDetailsId);
        $stmt->bindParam(':roleId', $this->roleId);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':notifications', $this->notifications);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User Name
    public function updateUserName(){
        $query = 'UPDATE '.$this->table.'
                    SET name = :name
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User Surname
    public function updateUserSurname(){
        $query = 'UPDATE '.$this->table.'
                    SET surname = :surname
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->surname = htmlspecialchars(strip_tags($this->surname));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':surname', $this->surname);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User Address
    public function updateUserAddress(){
        $query = 'UPDATE '.$this->table.'
                    SET address = :address
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->address = htmlspecialchars(strip_tags($this->address));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':address', $this->address);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User StreetId
    public function updateUserStreetId(){
        $query = 'UPDATE '.$this->table.'
                    SET streetId = :streetId
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->streetId = htmlspecialchars(strip_tags($this->streetId));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':streetId', $this->streetId);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User PaymentDetailsID
    public function updateUserPaymentDetailsId(){
        $query = 'UPDATE '.$this->table.'
                    SET paymentDetailsId = :paymentDetailsId
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->paymentDetailsId = htmlspecialchars(strip_tags($this->paymentDetailsId));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':paymentDetailsId', $this->paymentDetailsId);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User Role
    public function updateUserRole(){
        $query = 'UPDATE '.$this->table.'
                    SET roleId = :roleId
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->roleId = htmlspecialchars(strip_tags($this->roleId));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':roleId', $this->roleId);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User Email
    public function updateUserEmail(){
        $query = 'UPDATE '.$this->table.'
                    SET email = :email
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->email = htmlspecialchars(strip_tags($this->email));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':email', $this->email);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User Password
    public function updateUserPassword(){
        $query = 'UPDATE '.$this->table.'
                    SET password = :password
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':password', $this->password);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    // Updating User Notifications
    public function updateUserNotifications(){
        $query = 'UPDATE '.$this->table.'
                    SET notifications = :notifications
                    WHERE id = :id;';
        
        $stmt = $this->conn->prepare($query);

        // clean data sent by user (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->notifications = htmlspecialchars(strip_tags($this->notifications));

        // bind parameters to request
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':notifications', $this->notifications);

        if($stmt->execute()){
            return true;
        }

        printf('Error: %s. \n', $stmt->error);
        return false;
    }

    public function deleteUser(){
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