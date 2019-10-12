<?php include("includes/header.php"); ?>

<?php 
$productTable = new Product();
$view = new View();
$products = $productTable->getProductsOnSpecial(3);
?>
		
	<div class="content">
	
	<div class="search left">
		<?php echo $view->sortForm(); ?>
		<?php echo $view->searchForm(); ?>	
	</div>
	
	<div class="intro left">
	  <h3>Thanks for Shopping With Us!</h3><br/>
	  <p>Your payment has been received!  You will receive an email notification with a receipt shortly.  Enjoy your sweets!</p>
	  </p>
	</div>
	<br class="clear"/>
	<br/>
		
	<div class="product-list">
		<h2>Some Specials</h2>
		
		<ul class="specials">
				<?php echo $view->displaySpecials($products) ?>	
			</ul>
	</div><!-- product-list -->
	
	<br class="clear-all"/>
</div><!-- content -->
	
	</div><!-- maincontent -->

		<?php include("includes/footer.php"); ?>