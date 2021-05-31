<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForRegisterForm.php');

	if (isset($_POST['btnSave'])) 
	{
		$adminname=$_POST['txtadminname'];
		$email=$_POST['txtemail'];
		$password=$_POST['txtpass'];
		$role=$_POST['txtrole'];

		$select="SELECT * FROM admintable1 Where AdminName='$adminname' or Email='$email'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Admin Name or Email already exists !')</script>";
		}

		else
		{
			$insert=mysqli_query($connectfooddb,"INSERT INTO admintable1 (AdminName,Email,Password,Role) VALUES('$adminname','$email','$password','$role')");
		
		if ($insert) 
		{
			
			echo "<script>alert('Save Successfully')</script>";
			echo "<script>location='Login.php'</script>";
		}
		else
		{
			echo mysqli_error($connectfooddb);
		}
		}
		
	}

 ?>
<form action="Admin.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Admin Register
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Admin Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="text" name="txtadminname" required>
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
			Admin Password
		</span>

		<!-- <a href="#" class="txt2 bo1 m-l-5">
			Forgot?
		</a> -->
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Password is required">
		<input class="input100" type="password" name="txtpass" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-13 p-b-9">
		<span class="txt3">
			Role
		</span>

	
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Role is required">
		<input class="input100" type="text" name="txtrole" required>
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
<?php
include ('footer.php');
?>