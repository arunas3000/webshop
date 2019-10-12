<?php

class Checkout {
   
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
        
            }
    
            
             public function insertShippingDetails($email,  $firstname, $lastname, 
            $address, $city, $postcode, $telephone, $card_holder, $card_number, $card_exp, $card_pvv) {
        $memberInsertSql = "INSERT INTO `shipping`(`email`,"
                . " `firstname`,`lastname`, `address`, `city`, `postal_code`,"
                . " `phone`, `card_holder`, `card_number`, `card_exp`, `card_pvv`) VALUES ('$email', "
                . "'$firstname', '$lastname', '$address', '$city', '$postcode', "
                . "'$telephone', '$card_holder', '$card_number', '$card_exp', '$card_pvv')";
    
        $stmt = $this->pdo->prepare($memberInsertSql);
    $stmt->execute();
    }
   
   
            public function insertPurchaseDetails($transaction_id,  $product_id, $user_id, 
            $quantity, $sale_price) {
        $memberInsertSql = "INSERT INTO `purchases`(`transaction_id`, `product_id`,"
                . " `user_id`,`date`, `quantity`, `sale_price`) VALUES ('$transaction_id', "
                . "'$product_id', '$user_id', NOW(), '$quantity', '$sale_price')";
    
        $stmt = $this->pdo->prepare($memberInsertSql);
    $stmt->execute();
    }
         
    public function lastInsertId($name = NULL) {
    if(!$this->pdo) {
        throw new Exception('Not connected');
    }

    return $this->pdo->lastInsertId($name);
}
   
}

