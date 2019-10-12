<?php include("includes/header.php"); ?>

<?php 

$view = new View();

$products = new Product();

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
} 

$details = $products->getDetailsById($id);
?>

		
	<div class="content">	
	<br/>
	<div class="product-list">
		<h2>Product Details</h2>
		<br/>
		
		<?php echo $view->displayDetail($details); ?>
	</div><!-- product-list -->
<br class="clear-all"/>
</div><!-- content -->
</div><!-- maincontent -->
<?php include("includes/footer.php"); ?>
	