<?php include('includes/header.php') ?>
<?php $productTable = new Product();
$view = new View();
$products = $productTable->getProductsOnSpecial(6);

 ?>
		
	<div class="content">

<div id="leftnav">
	
	<div class="search">
		
		<?php echo $view->sortForm(); ?>
		<?php echo $view->searchForm(); ?>
		
		<h3>About Us</h3><br/>
		<p class="width180">Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer, Lorem ipsum dolor sit amet consectetuer
	  Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer.  <a href="about.php">Read More >> </a></p>
	</div>
</div><!-- leftnav -->


<div id="rightnav">

	<div class="product-list">
		<h2>Products on Special</h2>
		
		<ul>
			<?php echo $view->displaySpecials($products) ?>	
			</ul>
	</div><!-- product-list -->
	
	
</div><!-- rightnav -->

<br class="clear-all"/>
</div><!-- content -->
	
	</div><!-- maincontent -->

<?php include('includes/footer.php') ?>