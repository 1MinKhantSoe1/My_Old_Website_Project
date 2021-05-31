<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForLoginForm.php');

	if (isset($_SESSION['loginCount'])) 
	{
		if ($_SESSION['loginCount'] >= 3) 
		{
			echo "<script>window.alert('Please Try again in 1 Minute')</script>";
			echo "<script>window.location='LoginTimer.php'</script>";
		}
	}

	else if (!isset($_SESSION['loginCount'])) 
	{
		$_SESSION['loginCount']=0;
	}

	if (isset($_POST['btnLogin'])) 
	{
		$AdminName=$_POST['txtusername'];
		$password=$_POST['txtpass'];

		$select=mysqli_query($connectfooddb,'SELECT * FROM admintable1 WHERE AdminName="'.$AdminName.'" AND Password="'.$password.'"');
		$count=mysqli_num_rows($select);

		if ($count>0) 
		{
			$row=mysqli_fetch_array($select);
			$AdminID=$row['AdminID'];

			$_SESSION['AdminID']=$AdminID;
			
			echo "<script>alert('Login Successfully')</script>";
			unset($_SESSION['loginCount']);
			echo "<script>location='RecordForm.php'</script>";
		}
		else
		{
			$_SESSION['loginCount']++;
			echo "<script>alert('Incorrect UserName or Password')</script>";
			echo "<script>location='Login.php'</script>";	
			
		}
	}

 ?>
<form action="Login.php" method="post" class="login100-form validate-form flex-sb flex-w">
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

		<a href="Forget_Password.php" class="txt2 bo1 m-l-5">
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

		<a href="Admin.php" class="txt2 bo1">
			Register now
		</a>
	</div>
</form>
<?php
include ('footer.php');
?>