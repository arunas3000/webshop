<?php

class Members {
   
    public $user = 'root';
    public $dbname = 'webshop';
    public $password = '';
    public $host = 'localhost';
    public $dsn = '';
    public $pdo = '';
    public $testMode = TRUE;
    public $members = array();
    public $emails = array();
    public $users = array();
    public $userPassword = array();
    public $memberCount = '';




    public function __construct() {
        
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname";
        
        //Activate error mode if in development
        if($this->testMode) {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } else {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password);
        }
        
        //Query the data
        $sql = 'SELECT * FROM members';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        //Add data to an array
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->members[] = $row;
        }
        
        $this->memberCount = count($this->members);
    }
    
    public function getMembers() {
        return $this->members;
    }
    
    public function insertMembers($email, $username,  $firstname, $lastname, 
            $address, $city, $postcode, $telephone, $password) {
        $memberInsertSql = "INSERT INTO `members`(`email`, `username`,"
                . " `firstname`,`lastname`, `address`, `city`, `postal_code`,"
                . " `phone`, `password`) VALUES ('$email', '$username', "
                . "'$firstname', '$lastname', '$address', '$city', '$postcode', "
                . "'$telephone', '$password')";
    
        $stmt = $this->pdo->prepare($memberInsertSql);
    $stmt->execute();
    }
   
    public function emailExists($email) {
    
    $sql = "SELECT user_id FROM members WHERE email = '$email'";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->emails[] = $row;
        }
        
        $this->emailCount = count($this->emails);
        
    if($this->emailCount == 1){
        return TRUE;
    } else {
        return FALSE;
    }
}

public function userExists($username) {
    
     $sql = "SELECT user_id FROM members WHERE email = '$username'";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->users[] = $row;
        }
        
        $this->usersCount = count($this->users);
        
    if($this->usersCount == 1){
        return TRUE;
    } else {
        return FALSE;
    }
}

public function passwordExists($userPassword) {
    
     $sql = "SELECT user_id FROM members WHERE password = '$userPassword'";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->userPassword[] = $row;
        }
        
        $this->$userPasswordCount = count($this->$userPassword);
        
    if($this->userPasswordCount == 1){
        if(password_verify($this->userPassword['password'], $userPassword)) {
            return TRUE;
        } else {
            return FALSE;
        }
        return TRUE;
    } else {
        return FALSE;
    }
}

public function getMemberId($email) {
    $sql = "SELECT user_id FROM members WHERE email = '$email'";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $userID = $result['user_id'];
    return $userID;
}
    
}

