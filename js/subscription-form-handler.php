<?php 
$errors = '';
$myemail = 'info@elwebman.io';//<-----Put Your email address here.
require_once "newrecaptchalib.php";
$secret = "6LcNazwUAAAAAD8trVnjUskFVlKmmWn85EEUz98z";
$response = null;
$reCaptcha = new ReCaptcha($secret);
if(
	empty($_POST['email']) || 
	empty($_POST['g-recaptcha-response']) 
)
{
	$errors .= "\n Error: all fields are required";
}

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

 if ($response != null && $response->success) {
    echo "success reponse form google reCaptcha, insert data into database.";
  } else {
	echo "Error: Please click to confirm you are not a robot.";
}


$email_address = $_POST['email']; 

if (!preg_match(
	"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
	$email_address))
{
	$errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "New subscription";
	$email_body = "You have received a new message. New email address for the newsletter. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <webmaster@elwebman.io>' . "\r\n";
	
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: http://fluxlab.elwebman.io/contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
	<!-- This page is displayed only if there is some error -->
	<?php
	echo nl2br($errors);
	?>


</body>
</html>