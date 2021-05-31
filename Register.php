<?php 

	session_start();

	include('Connect.php');

	include('HeaderForRegisterForm.php');

	// if (isset($_POST['btnLogin'])) 
	// {
	// 	$email=$_POST['username'];
	// 	$password=$_POST['pass'];

	// 	$select=mysqli_query($connect,'SELECT * FROM user WHERE Email=\"$email\" AND Password=\"$password\"');
	// 	$count=mysqli_num_rows($select);

	// 	if ($count>0) 
	// 	{
	// 		$row=mysqli_fetch_array($select);
	// 		$_SESSION['uid']=$row['UserID'];
	// 		$_SESSION['uname']=$row['UserName'];
	// 		$uname=$_SESSION['uname'];

	// 		echo "<script>alert('Login Successfully, Welcome $uname')</script>";
	// 		echo "<script>location='UserRegister.php'</script>";
	// 	}
	// 	else
	// 	{
	// 		echo "<script>alert('Incorrect Email or Password')</script>";
	// 		echo "<script>location='Login.php'</script>";	
	// 	}
	// }

 ?>
<form action="Register.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Register
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Username
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Username is required">
		<input class="input100" type="text" name="txtusername" >
		<span class="focus-input100"></span>
	</div>
	
	<div class="p-t-13 p-b-9">
		<span class="txt3">
			Password
		</span>

		<!-- <a href="#" class="txt2 bo1 m-l-5">
			Forgot?
		</a> -->
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Password is required">
		<input class="input100" type="password" name="txtpass" >
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-13 p-b-9">
		<span class="txt3">
			Re-enter Password
		</span>

		<!-- <a href="#" class="txt2 bo1 m-l-5">
			Forgot?
		</a> -->
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Password is required">
		<input class="input100" type="password" name="txtrepass" >
		<span class="focus-input100"></span>
	</div>

	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Save" name="btnLogin" class="login100-form-btn">
		
	</div>

	<div class="w-full text-center p-t-55">
		<!-- <span class="txt2">
			Not a member?
		</span> -->

		<!-- <a href="#" class="txt2 bo1">
			Register now
		</a> -->
	</div>
</form>
<?php
include ('footer.php');
?>