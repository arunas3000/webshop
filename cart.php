
<?php include("includes/header.php"); ?>
<?php 

$products = new Product();

//Get the products from session array
$cartList = $products->getShoppingCart();


$view = new View();



// Process checkout
if (isset($_POST['checkout']) && isset($_SESSION['cart'])) {
	header('Location: checkout.php');
	exit;


} 


	if (isset($_POST['removeBtn'])) {
		// $key = product_id
                if(isset($_POST['remove'])) {
                     $removeItems = $_POST['remove'];
               //var_dump($removeItems);
                    foreach ($removeItems as $key => $value) {
			$key = (int) $key;
			
                       $products->delProductFromCart($key);
                        header('Location: remove.php');
                       
		}    	
                } else {
                    echo '<div class="warning-msg">
                            <i class="fa fa-warning"></i>
                            You must check the items you want to remove
                          </div>';
                }
               
            
	} 
        
	if (isset($_POST['updateBtn'])) {
		// $key = product_id
            if(isset($_POST['update'])) {
                $updateItems = $_POST['update'];
                //var_dump($updateItems);
                //var_dump($_POST['qty']);
                    foreach ($updateItems as $key => $value) {
			$key = (int) $key;
			$qty = (isset($_POST['qty'][$key])) ? (int) $_POST['qty'][$key] : 0;
			if ($qty) {
				$products->updateProductInCart($key, $qty);
                                header('Location: update.php');
			}
		}
                 
            }	else {
                 echo '<div class="warning-msg">
                            <i class="fa fa-warning"></i>
                            You must check the items you want to update
                          </div>';
            }
}

 ?>
	<div class="content">
<br/>
	<div class="product-list">
		<h2>Shopping Basket</h2>
		<br/>
		<form method="POST">
		<table>
			<tr>
				<th>Item No.</th><th>Product</th><th width="40%">Name</th><th>Amount</th><th width="10%">Price</th><th width="10%">Extended</th><th>&nbsp;</th>
			</tr>
			<?php echo $view->displayCart($cartList) ?> 
		</table>
		
		<br/>
		
		<div align="center checkout">
			<input type="submit" name="removeBtn" value="Remove" class="button"/>
			<input type="submit" name="updateBtn" value="Update" class="button"/>
			<input type="submit" name="checkout" value="Checkout" class="button"/>
		</div>
		</form>
	</div>

</div><!-- content -->
	
	</div><!-- maincontent -->

	<?php include("includes/footer.php"); ?>
