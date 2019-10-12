<?php include("includes/header.php"); ?>
		
<?php 

$checkout = new Checkout();
$productTable = new Product();
$member = new Members();

$productBasket = $productTable->getShoppingCart();


//Test input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Error output
function validation_error($error_message) {
    
    $error_message = <<<EOD
            <div class="error-msg">
  <i class="fa fa-times-circle"></i>
  $error_message
</div>
EOD;
    
    return $error_message;
}



//Errors
$error = array(
    'email' => '',
    'firstname' => '',
    'lastname' => '',
    'address' => '',
    'city' => '',
    'postcode' => '',
    'telephone' => '',
    'card_holder' => '',
    'card_number' => '',
    'card_exp' => '',
    'card_pvv' => ''
);

if(isset($_POST['buy'])) {
    $email = test_input($_POST['email']);
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $address = test_input($_POST['address']);
    $city = test_input($_POST['city']);
    $postcode = test_input($_POST['postcode']);
    $telephone = test_input($_POST['telephone']);
    $card_holder = test_input($_POST['card_holder']);
    $card_number = test_input($_POST['card_number']);
    $card_exp = test_input($_POST['card_exp']);
    $card_pvv = test_input($_POST['card_pvv']);
    
    
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
  $error['email'] =  validation_error('Invalid email address'); 
}


if (!preg_match("/[a-z0-9,. ]+$/i", $firstname)) {
  $error['firstname'] =  validation_error('Name should only contain letters, numbers, spaces, "," or "." '); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $lastname)) {
  $error['lastname'] =  validation_error('Name should only contain letters, numbers, spaces, "," or "." '); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $address)) {
  $error['address'] =  validation_error('Address should only contain letters, numbers, spaces, "," or "." '); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $city)) {
  $error['city'] =  validation_error('Address should only contain letters, numbers, spaces, "," or "." '); 
}

if (!preg_match("/[a-z0-9]+$/i", $postcode)) {
  $error['postcode'] =  validation_error('Postcode should only contain letters and numbers'); 
}

if (!preg_match("/^\+[0-9]{3}-[0-9]{3}-[0-9]{5}$/", $telephone)) {
  $error['telephone'] =  validation_error('Phone number must be in format +CCC-AAA-BBBBB'); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $card_holder)) {
  $error['card_holder'] =  validation_error('Card holder name should only contain letters, numbers, spaces, "," or "." '); 
}

if (!preg_match("/^[0-9]{16}$/", $card_number)) {
  $error['card_number'] =  validation_error('Card number should contain 16 digits'); 
}

if (!preg_match("/^[0-9]{4}$/", $card_exp)) {
  $error['card_exp'] =  validation_error('Card expiration year should contain only four digits'); 
}

if (!preg_match("/^[0-9]{4}$/", $card_pvv)) {
  $error['card_pvv'] =  validation_error('Card PVV number should be only contain four digits'); 
}



//Check for errors
$isValid = True;
foreach($error as $value) {
    if($value) {
        $isValid = False;
        break;
    }
}

if($isValid) {
  
    $checkout->insertShippingDetails($email, $firstname, $lastname, $address, $city, $postcode, $telephone, $card_holder, $card_number, $card_exp, $card_pvv);
    
    $lastInsertId = $checkout->lastInsertId();
    
    if(isset($_SESSION['email'])) {
        $user_email = $_SESSION['email'];
    } else {
        $user_email = NULL;
    }
    
    if($user_email != NULL) {
        $user_id = $member->getMemberId($user_email);
    } else {
        $user_id = NULL;
    }
    
    foreach ($productBasket as $cart) {
        
        $sale_price = $cart['qty'] * $cart['price'];
        $checkout->insertPurchaseDetails($lastInsertId,  $cart['product_id'], $user_id, $cart['qty'], $sale_price);
    
}
    
    unset($_SESSION['cart']);
    header('Location: thanks.php');
}   
}


?>

	<div class="content">
	<br/>
	<div class="product-list">
		
		<h2>Shipping information</h2>
		<br/>
		
                <p class="card-details">Please enter your shipping details</p><br/>
                <form method="POST">
			<p>
				<label>Email: </label>
                                <input type="text" name="email" />
                                
                        </p>
                        <?php if($error['email']) { echo $error['email'];}?>
                            
			<p>
				<label>Name: </label>
                                <input type="text" name="firstname" />
                             
                        </p>
			 <?php if($error['firstname']) { echo $error['firstname'];}?>
			<p>
				<label>Last Name: </label>
                                <input type="text" name="lastname" />
                        </p>
			 <?php if($error['lastname']) { echo $error['lastname'];}?>
			<p>
				<label>Address: </label>
                                <input type="text" name="address" />
			</p>
                         <?php if($error['address']) { echo $error['address'];}?>
			<p>
				<label>City: </label>
                                <input type="text" name="city" />
			</p>
                         <?php if($error['city']) { echo $error['city'];}?>
			<p>
				<label>Postcode: </label>
                                <input type="text" name="postcode" />
			</p>
                         <?php if($error['postcode']) { echo $error['postcode'];}?>
			<p>
				<label>Telephone: </label>
				<input type="text" name="telephone" />
			</p>
                        
                        <p class="card-details">Please enter your card details</p><br/>
                       <p>
				<label>Card holder name: </label>
                                <input type="text" name="card_holder" />
                             
                        </p>
			 <?php if($error['card_holder']) { echo $error['card_holder'];}?>
			<p>
				<label>Card number: </label>
                                <input type="text" name="card_number" />
                        </p>
			 <?php if($error['card_number']) { echo $error['card_number'];}?>
			<p>
				<label>Card expiration year: </label>
                                <input type="text" name="card_exp" />
			</p>
                         <?php if($error['card_exp']) { echo $error['card_exp'];}?>
			<p>
				<label>Card PVV number: </label>
                                <input type="text" name="card_pvv" />
			</p>
                         <?php if($error['card_pvv']) { echo $error['card_pvv'];}?>
			<p>
				
				<input type="submit" name="buy" value="Buy" class="button marL10"/>
			</p>
                         
		</form>
	</div><!-- product-list -->
</div>
	
	</div><!-- maincontent -->

	<?php include("includes/footer.php"); ?>
