<?php include('includes/header.php') ?>
<?php 

$member = new Members();
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
    'password' => '',
    'wrongEmail' => '',
    'wrongPassword' => ''
    
    
);

if(isset($_POST['submit'])) {
    
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
        
    
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
  $error['email'] =  validation_error('Invalid email address'); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $password)) {
  $error['password'] =  validation_error('Password should only contain letters, numbers, spaces, "," or "." '); 
}


if($member->emailExists($email) === FALSE) {
    $error['wrongEmail'] =  validation_error('This email doesn\'t exists');
}

if(!$member->passwordExists($password) === FALSE) {
    $error['wrongPassword'] =  validation_error('This password is not correct');
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
    
    $_SESSION['email'] = $email;
    header('Location: products.php');
    
}   
}

?>
		
	<div class="content">
	<br/>
	<div class="product-list">
		
		<h2>Login</h2>
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
				<label>Password: </label>
				<input type="password" name="password" />
			</p>
                           <?php if($error['password']) { echo $error['password'];}?>
                            <?php if($error['wrongPassword']) { echo $error['wrongPassword'];}?>

			<p>
				
				<input type="submit" name="submit" value="Submit" class="button marL10"/>
			</p>
		</form>
	</div><!-- product-list -->
</div>
	
	</div><!-- maincontent -->

	<?php include('includes/footer.php') ?>