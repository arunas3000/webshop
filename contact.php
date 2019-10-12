<?php include('includes/header.php') ?>

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php'; 

?>
<?php
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

function send_email($email, $subject, $msg, $name) {
    
    $mail = new PHPMailer();  
    
try {
    //Server settings
    $mail->SMTPDebug = 0;                                
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.mailtrap.io';  
    $mail->SMTPAuth = true;                               
    $mail->Username = '3f0ce9cf8ede98';                 
    $mail->Password = '06571859f14ac6';                           
    $mail->SMTPSecure = 'tls';                           
    $mail->Port = 2525; 
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    $mail->AltBody = $msg;
    $mail->setFrom($email, $name);
    $mail->addAddress('lenovo33@gmail.com');

    $mail->send();
    echo "<div class='success-msg'>
  <i class='fa fa-check'></i>
  Form succesfully submitted
</div>";
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
    

//Errors
$error = array(
    'email' => '',
    'name' => '',
    'message' => ''
    
);

if(isset($_POST['submit'])) {
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $message = test_input($_POST['message']);
        
    
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
  $error['email'] =  validation_error('Invalid email address'); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $name)) {
  $error['name'] =  validation_error('Name should only contain letters, numbers, spaces, "," or "." '); 
}

if (!preg_match("/[a-z0-9,. ]+$/i", $message)) {
  $error['message'] =  validation_error('Message should only contain letters, numbers, spaces, "," or "." '); 
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
    
    send_email($email, 'New message', $message, $name);
    
}   
}		
?>

<div class="content">
	<br/>
	<div class="product-list">
		
		<h2>Send a message</h2>
		<br/>
		
		<b>Please use this form to contact us</b><br/><br/>
		<form method="POST">
			<p>
				<label>Name: </label>
				<input type="text" name="name"/>
			</p>
                        <?php if($error['name']) { echo $error['name'];}?>
			<p>
				<label>Email Address: </label>
				<input type="text" name="email"/>
			</p>
                        <?php if($error['email']) { echo $error['email'];}?>
			<p>
				<label>Comments / Questions: </label>
				<textarea name="message">I love your products!</textarea>
			</p>
                        <?php if($error['message']) { echo $error['message'];}?>
                        
			<p>
				
				<input type="submit" name="submit" value="Submit" class="button marL10"/>
			</p>
		</form>
	</div><!-- product-list -->

<br class="clear-all"/>
</div><!-- content -->

</div><!-- maincontent -->
	
	

	<?php include('includes/footer.php') ?>
