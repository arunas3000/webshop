<?php include("includes/header.php"); ?>
<?php 


$view = new View();

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
	  </p>
	</div>
	<br class="clear"/>
	<br/>
	
	<div class="product-list">
	<table>
 	  <tr>
		<td width="50%">
                    <h3>Chocolates</h3>
                    <p id="choco">
		Suspendisse potenti. Donec commodo hendrerit arcu, vitae laoreet tortor scelerisque vestibulum. Nulla sem magna, aliquet quis semper vitae, 
		semper vel ligula. Proin condimentum tellus mattis leo varius dictum. In ornare iaculis enim. Donec sed tortor massa. Vivamus neque nulla, 
		sagittis nec facilisis id, porta ut nisl. Praesent ultricies leo dignissim sem sollicitudin dictum. Nullam ultricies augue iaculis mi 
		placerat adipiscing. Nullam pulvinar sem vel nibh egestas mollis. Fusce venenatis sodales velit, sit amet mollis diam vehicula at. 
		Fusce posuere lobortis arcu, nec mattis risus hendrerit non. Aenean luctus vestibulum eros eget lobortis. Proin nunc lorem, molestie ut 
		pulvinar a, ullamcorper non tortor. Proin ultrices justo quis lectus posuere convallis in eu elit.
		</p>
		</td>
		<td width="50%">
                    <img src="images/sweet-1.scale_20.JPG" width="360" height="240" alt="sweet1" />
		</td>
	  </tr>
	  <tr>
		<td width="50%">
                    <img src="images/sweet-2.scale_20.JPG" width="360" height="240" alt="sweet2" />
		</td>
		<td width="50%">
                    <h3>Candies</h3>
                    <p id="candy">
		Aliquam a dui ut ligula iaculis dictum a eget dui. Suspendisse potenti. Pellentesque in elit laoreet risus tristique fermentum vel eget augue. 
		Sed id lacus ut ligula lacinia mattis. Aliquam eget blandit erat. Donec pretium tincidunt gravida. Praesent tincidunt imperdiet massa 
		convallis varius. Mauris a sollicitudin turpis. Cras nibh orci, commodo id cursus sed, facilisis sit amet dui. Sed quis ligula luctus 
		lacus aliquam imperdiet et et erat. Nunc eget augue quis lorem egestas mattis. 
		Nam dolor arcu, sagittis sed molestie nec, cursus ut magna. Aenean euismod pellentesque massa ac auctor. Proin id hendrerit magna. 
		Etiam auctor hendrerit mollis. Fusce nec diam ut elit tempus semper. Phasellus dictum nibh nec tortor vestibulum egestas. In et mauris 
		dui.
		</p>
		</td>
	  </tr>
	</table>
	</div><!-- product-list -->

<br class="clear-all"/>
</div><!-- content -->
	
	</div><!-- maincontent -->

	<?php include("includes/footer.php"); ?>


