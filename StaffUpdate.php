<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForFoodTypeUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM staff WHERE StaffID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$sid=$row['StaffID'];
		$name=$row['StaffName'];
		$Age=$row['Age'];
		$gender=$row['Gender'];
		$address=$row['Address'];
		$phonenumber=$row['PhoneNumber'];
		$nrc=$row['NRC'];
		$email=$row['Email'];
		$position=$row['Position'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtStaffID'];
		$Name=$_POST['txtName'];
		$age=$_POST['txtAge'];
		$gender=$_POST['cboGender'];
		$address=$_POST['txtAddress'];
		$phno=$_POST['txtPhoneNumber'];
		$nrc=$_POST['txtNRC'];
		$email=$_POST['txtEmail'];
		$position=$_POST['txtPosition'];


		$select="SELECT * FROM staff Where StaffName='$Name'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Staff Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update staff
				SET StaffName='$Name',
				Age='$age',Gender='$gender',
				Address='$address',PhoneNumber='$phno',
				NRC='$nrc',Email='$email',Position='$position'
				WHERE StaffID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='RecordStaff.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="StaffUpdate.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Update Staff
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Staff ID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtStaffID" readonly value="<?php echo $sid?>">
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Staff Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtName" value="<?php echo $name?>" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Age
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtAge"  value="<?php echo $Age ?>" required onkeypress="isInputNumber(event)">
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
			Gender
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboGender" required>
 								<option><?php echo $gender?></option>
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
		<input class="input100" type="text" name="txtAddress"  value="<?php echo $address ?>" required>
		<span class="focus-input100"></span>
	</div>


	<div class="p-t-31 p-b-9">
		<span class="txt1">
			PhoneNumber
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtPhoneNumber"  value="<?php echo $phonenumber ?>" required onkeypress="isInputNumber(event)">
		<span class="focus-input100"></span>
	</div>


	<div class="p-t-31 p-b-9">
		<span class="txt1">
			NRC
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtNRC" value="<?php echo $nrc ?>" required>
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Email Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="email" name="txtEmail" value="<?php echo $email ?>" required>
		<span class="focus-input100"></span>
	</div>


	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Position
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtPosition" value="<?php echo $position ?>" required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="w-full text-center p-t-55">
		
	</div>

	
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="submit" value="Update" name="btnUpdate" class="login100-form-btn">
		
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