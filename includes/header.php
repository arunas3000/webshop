<?php include("init.php"); ?>
<?php include("View/View.php"); ?>
<?php include("Model/Products.php"); ?>
<?php include("Model/Members.php"); ?>
<?php include("Model/Checkout.php"); ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Sweet Cafe | Home</title>
    <meta name="description" content="Webshop">
    <meta name="keywords" content="e-commerce, webshop, php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!--Stylesheets-->
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Sarabun:300,400,500" rel="stylesheet">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     
   
        
</head>
<body>
<div id="wrapper">
	<div id="maincontent">		
	<div id="header">
		<div id="logo" class="left">
			<a href="index.php"><img src="images/logo.png" alt="SweetsComplete.Com"/></a>
		</div>
		<div class="right marT10">
			<b>
			<a href="login.php" >Login</a>
                        <a href="members.php" >Our Members</a>
                        <a href="cart.php" >Shopping Cart</a>
                        <?php if(logged_in()): ?>
                            <a href="logout.php">Log Out</a>
                        <?php endif; ?>
			</b>
		</div>
		<ul class="topmenu">
		<li><a href="about.php">About Us</a></li>
		<li><a href="products.php">Products</a></li>
		<li><a href="specials.php">Specials</a></li>
		<li><a href="contact.php">Contact Us</a></li>
                
            

		</ul>
		<br>
		<div class="banner"><p></p></div>
		<br class="clear"/>
	</div> <!-- header -->
        