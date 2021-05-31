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
		$Township=$_POST['txtTown'];

		$select="SELECT * FROM township Where TownshipName='$Township'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('This Township is Already Exist')</script>";
		}

		else
		{
			$insert=mysqli_query($connectfooddb,"INSERT INTO township (TownshipName) VALUES('$Township')");
		
		if ($insert) 
		{
			
			echo "<script>alert('Save Successfully')</script>";
			echo "<script>location='RecordTownship.php'</script>";
		}
		else
		{
			echo mysqli_error($connectfooddb);
		}
		}
		
	}
 ?>
<form action="RecordTownship.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Record Township
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Township Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtTown"  required>
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
include ('footerfortownship.php');
?>