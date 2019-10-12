

<?php if(isset($_GET['productID'])){
    $id = (int) $_GET['productID'];
} 

 if(isset($_GET['qty'])){
    $qty = (int) $_GET['qty'];
} ?>

<?php include('init.php'); ?>

   
<?php 
//Check if the information is set and is correct
if ($id && $qty) {
    require './Model/Products.php';
    $products = new Product();
    $cart_array = $products->addProductsToCart($id, $qty);
    
     $_SESSION['cart'][] = $cart_array;
}


header('Location: products.php');
exit();



?>
	