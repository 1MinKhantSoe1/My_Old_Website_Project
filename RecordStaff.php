<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForAllDisplay.php');

	if (!isset($_SESSION['AdminID'])) 
	{	
	echo "<script> alert('Please Login First'); window.location.assign('Login.php'); </script>";
	}
	
	if (isset($_POST['btnSave'])) 
	{
		$Name=$_POST['txtName'];
		$Age=$_POST['txtAge'];
		$Gender=$_POST['cboGender'];
		$Address=$_POST['txtAddress'];
		$PhoneNumber=$_POST['txtPhoneNumber'];
		$NRC=$_POST['txtNRC'];
		$Email=$_POST['txtEmail'];
		$Position=$_POST['txtPosition'];

		$select="SELECT * FROM staff Where StaffName='$Name'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('This Staff is Already Exist')</script>";
		}

		else
		{
			$insert=mysqli_query($connectfooddb,"INSERT INTO staff (StaffName,Age,Gender,Address,PhoneNumber,NRC,Email,Position) VALUES('$Name','$Age','$Gender','$Address','$PhoneNumber','$NRC','$Email','$Position')");
		
		if ($insert) 
		{
			
			echo "<script>alert('Save Successfully')</script>";
			echo "<script>location='RecordStaff.php'</script>";
		}
		else
		{
			echo mysqli_error($connectfooddb);
		}
		}
		
	}
 ?>
<form action="RecordStaff.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Record Staff
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Staff Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtName"  required>
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Age
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtAge"  required onkeypress="isInputNumber(event)">
		<span class="focus-input100"></span>
	</div>


	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Gender
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboGender" required>
 								<option>Choose Gender</option>
 								<option>Male</option>
 								<option>Female</option>
 		</select>
		<span class="focus-input100"></span>
	</div>


	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtAddress"  required>
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			PhoneNumber
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtPhoneNumber"  required onkeypress="isInputNumber(event)">
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			NRC
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtNRC"  required>
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Email Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="email" name="txtEmail"  required>
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Position
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtPosition"  required>
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
include ('footerforstaff.php');
?>