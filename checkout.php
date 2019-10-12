<?php include("includes/header.php"); ?>

<?php 

$products = new Product();

//Get the products from session array
$cartArr = $products->getShoppingCart();

$view = new View();

if (isset($_POST['back'])) {
	header('Location: products.php');
	exit;
}

if (isset($_POST['buy'])) {
	header('Location: shipping.php');
	exit;
}




?>
		
	<div class="content">
<br/>
	<div class="product-list">
		<h2>Shopping Basket</h2>
		<br/>
		 <table>
		<tr>
		<th>Item No.</th><th>Product</th><th width="40%">Name</th><th>Amount</th>
                <th width="10%">Price</th><th width="10%">Extended</th>
		</tr>
		<?php echo $view->displayBasket($cartArr); ?>
                </table>
		<br/>
		
		<p align="center">
                <form method="POST">
			<input type="submit" name="back" value="Back to Shopping" class="button"/>
                        <input type="submit" name="buy" value="Buy Now" class="button"/>
                </form>
			
		<p>
			</div>

</div><!-- content -->
	
	</div><!-- maincontent -->

	<?php include("includes/footer.php"); ?>
