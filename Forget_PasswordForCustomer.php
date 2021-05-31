<?php 


	include('ConnectForFooddb.php');

	include('HeaderForRestaurantDisplay.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btnSave']))
{
	$email=$_POST['txtemail'];

		$select="SELECT * FROM customer Where Email='$email'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);
		$row=mysqli_fetch_array($run);

		if ($count>0) 
		{
			require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';

			// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try {
			    //Server settings
			    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
			    $mail->isSMTP();                                            // Set mailer to use SMTP
			    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'hakhakfooddelivery@gmail.com';                     // SMTP username
			    $mail->Password   = 'hakhaktyler';                               // SMTP password
			    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			    $mail->Port       = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('hakhakfooddelivery@gmail.com', 'HakHakFoodDelivery');
			    $mail->addAddress($email,$email);     // Add a recipient
			    // $mail->addAddress('ellen@example.com');               // Name is optional
			    // $mail->addReplyTo('info@example.com', 'Information');
			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');

			    // // Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Forgot Password';
			    $mail->Body    = 'Hi "'.$email.'" your Password is {" '.$row['Password'].' "} ';
			    $mail->AltBody = 'Hi "'.$email.'" your Password is {" '.$row['Password'].' "} ';

			    $mail->send();
			    echo "<script>alert('Your Password has been sent on your Email '); window.location.assign('CustomerLogin.php'); </script>";
			} catch (Exception $e) {
			    echo "Message could not be sent.";
			    echo "Mailer Error:".$mail->ErrorInfo;
			}
		}
		else
		{
			echo "<script>alert('Email Not Found')</script>";
		}




}
	
 ?>

 <div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
          
          <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

<link rel="stylesheet" href="assets/tether/tether.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/theme/css/style.css">
<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

 
  <section class="engine"><a href="https://mobirise.info/j">website templates</a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/datatables/jquery.data-tables.min.js"></script>
  <script src="assets/datatables/data-tables.bootstrap4.min.js"></script>
  <script src="assets/theme/js/script.js"></script>

<form action="Forget_PasswordForCustomer.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Forget Password
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Email
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="email" name="txtemail"  required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="w-full text-center p-t-55">
		
	</div>

	
	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Send" name="btnSave" class="login100-form-btn">
		
	</div>
	<div class="w-full text-center p-t-55">
		
	</div>

</form>
</div>
</div>
</div>
</div>

<?php
include ('FooterForCustomerMainForm.php');
?>