<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForRestaurantDisplay.php');

	if (isset($_SESSION['loginCount'])) 
	{
		if ($_SESSION['loginCount'] >= 3) 
		{
			echo "<script>window.alert('Please Try again in 1 Minute')</script>";
			echo "<script>window.location='LoginTimerForCustomer.php'</script>";
		}
	}

	else if (!isset($_SESSION['loginCount'])) 
	{
		$_SESSION['loginCount']=0;
	}

	if (isset($_POST['btnLogin'])) 
	{
		$UserName=$_POST['txtusername'];
		$password=$_POST['txtpass'];

		$select=mysqli_query($connectfooddb,'SELECT * FROM customer WHERE UserName="'.$UserName.'" AND Password="'.$password.'"');
		$count=mysqli_num_rows($select);

		if ($count>0) 
		{
			$row=mysqli_fetch_array($select);
			$CustomerID=$row['CustomerID'];
			$CustomerName=$row['UserName'];

			$_SESSION['CustomerID']=$CustomerID;
			$_SESSION['CustomerName']=$CustomerName;

			echo "<script>alert('Login Successfully')</script>";
			unset($_SESSION['loginCount']);
			echo "<script>location='MainForm.php'</script>";
		}
		else
		{
			$_SESSION['loginCount']++;
			echo "<script>alert('Incorrect UserName or Password')</script>";
			echo "<script>location='CustomerLogin.php'</script>";	
			
		}
	}

 ?>
 <div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
          <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s">Welcome to HakHak Food</h2>
            </div>

            <figure class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">

          <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

<form action="#" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Login
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

		<a href="Forget_PasswordForCustomer.php" class="txt2 bo1 m-l-5">
			Forgot?
		</a>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Password is required">
		<input class="input100" type="password" name="txtpass" >
		<span class="focus-input100"></span>
	</div>

	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Login" name="btnLogin" class="login100-form-btn">
		
	</div>

	<div class="w-full text-center p-t-55">
		<span class="txt2">
			Not a member?
		</span>

		<a href="CustomerRegister.php" class="txt2 bo1">
			Register now
		</a>
	</div>
</form>
</div>
</figure>
 </div>
</div>
<?php
include ('FooterForCustomerMainForm.php');
?>