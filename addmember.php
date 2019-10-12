<?php include("includes/header.php"); ?>
		
<?php 

$member = new Members();
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
    'username' => '',
    'firstname' => '',
    'lastname' => '',
    'address' => '',
    'city' => '',
    'postcode' => '',
    'telephone' => '',
    'password' => '',
     'wrongEmail' => '',
    'wrongUsername' => ''
);

if(isset($_POST['submit'])) {
    $email = test_input($_POST['email']);
    $username = test_input($_POST['username']);
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $address = test_input($_POST['address']);
    $city = test_input($_POST['city']);
    $postcode = test_input($_POST['postcode']);
    $telephone = test_input($_POST['telephone']);
    $password = test_input($_POST['password']);
    
    
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
  $error['email'] =  validation_error('Invalid email address'); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $username)) {
  $error['username'] =  validation_error('Name should only contain letters, numbers, spaces, "," or "." '); 
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

if (!preg_match("/[a-z0-9,. ]+$/i", $password)) {
  $error['password'] =  validation_error('Password should only contain letters, numbers, spaces, "," or "." '); 
}

if($member->emailExists($email)) {
    $error['wrongEmail'] =  validation_error('This email already exists');
}

if($member->userExists($username)) {
    $error['wrongUsername'] =  validation_error('This username already exists');
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
    
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
    
    $member->insertMembers($email, $username, $firstname, $lastname, $address, $city, $postcode, $telephone, $password);
    echo "<div class='success-msg'>
  <i class='fa fa-check'></i>
  Form succesfully submitted, you can now login
</div>";
}   
}


?>

	<div class="content">
	<br/>
	<div class="product-list">
		
		<h2>Sign Up</h2>
		<br/>
		
		<b>Please enter your information.</b><br/><br/>
                <form method="POST">
			<p>
				<label>Email: </label>
                                <input type="text" name="email" />
                                
                        </p>
                        <?php if($error['email']) { echo $error['email'];}?>
                        <?php if($error['wrongEmail']) { echo $error['wrongEmail'];}?>
			<p>
                            <p>
				<label>Username: </label>
                                <input type="text" name="username" />
                                
                        </p>
                        <?php if($error['username']) { echo $error['username'];}?>
                        <?php if($error['wrongUsername']) { echo $error['wrongUsername'];}?>
			<p>
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
                        
                        <p>
				<label>Password: </label>
                                <input type="password" name="password" />
			</p>
                         <?php if($error['telephone']) { echo $error['telephone'];}?>
			<p>
				
				<input type="submit" name="submit" value="Submit" class="button marL10"/>
			</p>
                         
		</form>
	</div><!-- product-list -->
</div>
	
	</div><!-- maincontent -->

	<?php include("includes/footer.php"); ?>
