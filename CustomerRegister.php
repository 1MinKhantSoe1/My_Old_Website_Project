<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForRestaurantDisplay.php');

	if (isset($_POST['btnSave'])) 
	{
		$username=$_POST['txtusername'];
		$email=$_POST['txtemail'];
		$password=$_POST['txtpass'];
		$PhoneNumber=$_POST['txtphonenumber'];
		$Address=$_POST['txtaddress'];
		$Township=$_POST['txttownship'];

		$select="SELECT * FROM customer Where UserName='$username' or Email='$email'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('User Name or Email already exists ')</script>";
		}

		else
		{
			$insert=mysqli_query($connectfooddb,"INSERT INTO customer (UserName,Email,Password,PhoneNumber,Address,TownShip) VALUES('$username','$email','$password','$PhoneNumber','$Address','$Township')");
		
		if ($insert) 
		{
			
			echo "<script>alert('Save Successfully')</script>";
			echo "<script>location='CustomerLogin.php'</script>";
		}
		else
		{
			echo mysqli_error($connectfooddb);
		}
		}
		
	}

 ?>
 <div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
          
          <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Register
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			UserName
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="text" name="txtusername" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Email
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="email" name="txtemail" required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="p-t-13 p-b-9">
		<span class="txt3">
			Password
		</span>

	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Password is required">
		<input class="input100" type="password" name="txtpass" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			PhoneNumber
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="text" name="txtphonenumber" onkeypress="isInputNumber(event)" required>
		<span class="focus-input100"></span>
	</div>
	<script type="text/javascript">
		function isInputNumber(evt)
		{
			var ch= String.fromCharCode(evt.which);

			if(!(/[0-9]/.test(ch)))
			{
				evt.preventDefault();
			}
		}
	</script>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="text" name="txtaddress" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Township
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="text" name="txttownship" required>
		<span class="focus-input100"></span>
	</div>

	
	<div class="w-full text-center p-t-55">
		
	</div>

	
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="submit" value="Save" name="btnSave" class="login100-form-btn">
		
	</div>
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="reset" value="Cancel" name="btnCancel" class="login100-form-btn">
		
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