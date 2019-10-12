


<?php include("includes/header.php"); ?>


<?php 

//Create new instance of a View class
$view = new View();
$productTable = new Product();

$products = $productTable->getProductsByPrice();

$productCount = count($products);



// Sse the "ternary" operator to check if page param is set
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 0;

// Use "ternary" operator to check to see if page is 0
$prev = ($page == 0) ? 0 : $page - 1;
$next = $page + 1;


  if(isset($_SESSION['cart'])) {
                     $message = 'You have items in your shopping cart';
                    
                } else {
                     $message = 'Currently there are no items in your shopping cart';
                } 

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
		<h2>Our Products</h2>
                <a class="pages" href="sortByPrice.php?page=<?php echo $prev; ?>">&lt;prev</a>
		&nbsp;|&nbsp;
		<a class="pages" href="sortByPrice.php?page=<?php echo $next; ?>">next&gt;</a>
                <?php if(isset($message)) {
                    echo "<b>".$message . "</b>" ;
                    
                } else {
                    echo "";
                }  ?>

			<ul>
                            <?php echo $view->displayProducts($page, $productCount, $products); ?>
		</ul>
	</div><!-- product-list -->
	
        
	
</div><!-- rightnav -->

<br class="clear-all"/>
</div><!-- content -->
	
	</div><!-- maincontent -->

	<?php include("includes/footer.php"); ?>

