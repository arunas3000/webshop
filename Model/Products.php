<?php

class Product {
   
    public $user = 'root';
    public $dbname = 'webshop';
    public $password = '';
    public $host = 'localhost';
    public $dsn = '';
    public $pdo = '';
    public $testMode = TRUE;
    public $products = array();
    public $productCount = '';




    public function __construct() {
        
        
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname";
        
        //Activate error mode if in development
        if($this->testMode) {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } else {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password);
        }
        
        //Query the data
        $sql = 'SELECT * FROM products';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        //Add data to an array
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->products[] = $row;
        }
        
        $this->productCount = count($this->products);
    }
    
    public function getDetailsById($id) {
        $sql1 = "SELECT * FROM products WHERE product_id = ?";
         $stmt1 = $this->pdo->prepare($sql1);
        $stmt1->execute(array($id));
        
        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
        
        return $row1;

    }
    
    public function addProductsToCart($id, $quantity) {
        
        $details = $this->getDetailsById($id);
        if($details) {
            $details['qty'] = $quantity;
        
           return $details; 
        
        }
    }
    
    public function getShoppingCart() {
        if(isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        } else {
           
            return array();
        }
    }
    
    public function getProducts() {
        return $this->products;
    }
    
    public function getTitles() {
        
        $titles = array();
        
        foreach ($this->products as $row) {
            $titles[] = $row['title'];
        }
        return $titles;
    }
    
    public function getProductsOnSpecial($limit = 0) {
		
		
		$sql = 'SELECT * FROM `products` WHERE `special` = 1 ORDER BY `title`';
		if ($limit) {
			$sql .= ' LIMIT ' . $limit;
		}

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$content = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$content[] = $row;
		}
		return $content;
	}
        
        public function delProductFromCart($productID)
	{
		$removed = FALSE;
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key => $row) {
                            if ($key == $productID) {
                                array_splice($_SESSION['cart'], $key, 1);
					//unset($_SESSION['cart'][$key]);
                                        
					$removed = TRUE;
					break;
				
                        }
			}
		}
		return $removed;
	}
	

       public function updateProductInCart($productID, $qty)
	{
		$updated = FALSE;
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key => $row) {
				if ($key == $productID) {
					$_SESSION['cart'][$key]['qty'] = $qty;
					$updated = TRUE;
					break;
				}
			}
		}
		return $updated;
	}
        public function getProductsByTitleOrDescription($search)
	{
		
		$search = str_ireplace(array("'",'-','"',';'), '', $search);
		$search = "'%" . $search . "%'";
		
		$sql = 'SELECT * FROM `products` WHERE '
			  . '`title` LIKE ' . $search . ' OR '
			  . '`description` LIKE ' . $search . ' ORDER BY `title`';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$content = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$content[] = $row;
		}
		return $content;
	}
        public function getProductsByTitle() {
            $sql = 'SELECT * FROM `products` ORDER BY `title`';
		
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$content = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$content[] = $row;
		}
		return $content;
        }
        
         public function getProductsByPrice() {
            $sql = 'SELECT * FROM `products` ORDER BY `price` ASC';
		
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$content = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$content[] = $row;
		}
		return $content;
        }
	
}

