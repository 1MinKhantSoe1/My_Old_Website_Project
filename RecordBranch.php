<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForAllDisplay.php');
	
	if (isset($_POST['btnSave'])) 
	{
			$BranchName=$_POST['txtBranchName'];
			$RestaurantID=$_POST['cboRestaurant'];

		$select="SELECT * FROM branch Where BranchName='$BranchName'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('This Branch is Already Exist')</script>";
		}
			else
			{
				$insert=mysqli_query($connectfooddb,"INSERT INTO branch (BranchName,RestaurantID) VALUES ('$BranchName','$RestaurantID')");
					if ($insert) 
					{
						echo "<script>alert('Save Successfully')</script>";
						echo "<script>location='RecordBranch.php'</script>";
					}
					else
					{
						echo mysqli_error($connectfooddb);
					}
			}
			
	}
	
 ?>
<form action="RecordBranch.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Record Branch
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			 Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtBranchName" required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Restaurant
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "Restaurant is required">
		<select name="cboRestaurant" required>
 								<option>Choose Restaurant</option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM restaurant1");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$Name=$data['Name'];
 											$RestaurantID=$data['RestaurantID'];

 											echo "<option value='$RestaurantID'>$Name</option>";
 										}
 								 	?>
 		</select>
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

	</div>
	<div class="w-full text-center p-t-55">
		
	</div>

	</div>
	

</form>
<?php
include ('footerforbranch.php');
?>