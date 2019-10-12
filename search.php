<?php include('includes/header.php'); ?>
<?php 
$productTable = new Product();
$view = new View();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Sse the "ternary" operator to check if page param is set
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 0;

// Use "ternary" operator to check to see if page is 0
$prev = ($page == 0) ? 0 : $page - 1;
$next = $page + 1;

$maxProducts = 0;
$search = '';
// Do search
if (isset($_GET['keyword']) && $_GET['keyword'] != 'keywords') {
	 
	$search = test_input($_GET['keyword']);
        
        //Return the array of products that matches the keywords
	$products = $productTable->getProductsByTitleOrDescription($search);
        
        
       $maxProducts = count($products);
        
} else {
	$products = array();
}


 
?>

		
	<div class="content">

<div id="leftnav">
	<div class="search">
        <?php echo $view->sortForm(); ?>
		<?php echo $view->searchForm(); ?>
            
		
		<h3>About Us</h3><br/>
		<p class="width180">Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer, Lorem ipsum dolor sit amet consectetuer
	  Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer. Lorem ipsum dolor sit amet consectetuer.  <a href="about.html">Read More >> </a></p>
	</div>
</div><!-- leftnav -->


<div id="rightnav">

	<div class="product-list">
		<h2>Search Results</h2>
                  <a class="pages" href="search.php?keyword=<?php echo $search ?>&page=<?php echo $prev; ?>">&lt;prev</a>
		&nbsp;|&nbsp;
		<a class="pages" href="search.php?keyword=<?php echo $search ?>&page=<?php echo $next; ?>">next&gt;</a>
                
                <ul>
		<?php if($maxProducts > 0) {
                  echo $view->displayProducts($page, $maxProducts, $products);
                }  else {
                    echo '<h3>No results were found</h3>';
                }
                 
                
                ?>
                </ul>
	</div><!-- product-list -->
	
	
</div><!-- rightnav -->

<br class="clear-all"/>
</div><!-- content -->
	
	</div><!-- maincontent -->

	<?php include('includes/footer.php'); ?>

