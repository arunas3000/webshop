<?php include("includes/header.php"); ?>
		<?php $productTable = new Product();
$view = new View();
$products = $productTable->getProductsOnSpecial(6);

 ?>
	<div class="content">
	
	<div class="search left">
		<form name="search" method="get" action="search.html" id="search">
			<input type="text" value="keywords" name="keyword" class="s0" />
			<br />
			<select name="title" class="s2">
			<option value="00000019"> Ambrosia Salad</option><option value="00000034"> Apple Pie a la Mode</option><option value="00000014"> Apple Turnover</option><option value="00000054"> Baked Alaska</option><option value="00000031"> Baklava</option><option value="00000060"> Banana Bread</option><option value="00000026"> Banana Pudding</option><option value="00000058"> Banana Split</option><option value="00000046"> Black Forest Cake</option><option value="00000059"> Boston Cream Pie</option><option value="00000039"> Bread Pudding   </option><option value="00000023"> Candied Ginger</option><option value="00000052"> Carrot Cake</option><option value="00000007"> Cheesecake</option><option value="00000013"> Cherry Pie</option><option value="00000003"> Chocolate Angelfood Cupcakes</option><option value="00000016"> Chocolate Chip Cookies</option><option value="00000021"> Chocolate Eclair</option><option value="00000032"> Chocolate Fondue</option><option value="00000061"> Chocolate Layer Cake</option><option value="00000030"> Chocolate Mousse</option><option value="00000017"> Chocolate Souffle</option><option value="00000022"> Chocolate Toaster Tarts</option><option value="00000036"> Cinnamon Roll</option><option value="00000040"> Coconut Custard Pie</option><option value="00000041"> Coconut Macaroon</option><option value="00000012"> Crispy Rice Treats</option><option value="00000010"> Devils Food Cake</option><option value="00000009"> Fortune Cookies</option><option value="00000047"> Fruit Cake</option><option value="00000006"> Fruit Salad</option><option value="00000001"> Fudge</option><option value="00000037"> Gingerbread Cookies</option><option value="00000038"> Gingerbread Dude</option><option value="00000008"> Glazed Doughnut</option><option value="00000056"> Hot Fudge Sundae</option><option value="00000053"> Ice Cream Cake</option><option value="00000042"> Ice Cream Cone</option><option value="00000055"> Ice Cream Sandwich</option><option value="00000043"> Mint Chocolate Milk Shake</option><option value="00000015"> Napoleon</option><option value="00000035"> Neapolitan Ice Cream</option><option value="00000029"> Oatmeal Raisin Cookies</option><option value="00000063"> Oreo Cookies</option><option value="00000020"> Peach Cobbler</option><option value="00000004"> Peanut Brittle</option><option value="00000028"> Peanut Butter Cookies</option><option value="00000011"> Peanut Butter Cups</option><option value="00000044"> Pecan Pie</option><option value="00000057"> Pecan Praline Ice Cream</option><option value="00000064"> Pop Tarts</option><option value="00000050"> Pumpkin Ice Cream</option><option value="00000048"> Pumpkin Nut Bread</option><option value="00000049"> Pumpkin Pie</option><option value="00000051"> Rhubarb Crumble</option><option value="00000062"> Shortbread Cookies</option><option value="00000045"> Smores</option><option value="00000024"> Spice Cake</option><option value="00000033"> Strawberry Shortcake</option><option value="00000002"> Sugar Cookies</option><option value="00000025"> Tapioca Pudding</option><option value="00000005"> Toasted Marshmallows</option><option value="00000027"> Vanilla Cream Pie   </option><option value="00000018"> Walnut Brownies</option></select>
			<br />
			<input type="submit" name="search" value="Search Products" class="button marT5" />
			<input type="hidden" name="page" value="search" />
		</form>
		<br /><br />
	</div>
	
	<div class="intro left">
	  <h3>Shopping cart has been succesfully updated</h3><br/>
	  
	  
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
