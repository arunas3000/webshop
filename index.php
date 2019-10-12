<?php include("includes/header.php"); ?>

<?php $productTable = new Product();
$view = new View();
$products = $productTable->getProductsOnSpecial(3);

 ?>
		
	<div class="content">
	
	<div class="search left">
		<?php echo $view->sortForm(); ?>
		<?php echo $view->searchForm(); ?>
            
	</div>
	
	<div class="intro left">
	  <h3>About Us</h3><br/>
	  <p>Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer, Lorem ipsum dolor sit amet consectetuer
	  Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer.
	  <a href="about.php">Read More</a>
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
