<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForBranchUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM Branch b, restaurant1 r WHERE b.RestaurantID=r.RestaurantID and BranchID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$Bid=$row['BranchID'];
		$BName=$row['BranchName'];
		$Rid=$row['Name'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$Bid=$_POST['txtBranchID'];
		$Name=$_POST['txtName'];
		$Rid=$_POST['cboRestaurant'];


		$select="SELECT * FROM branch Where BranchName='$Name'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Branch Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update branch
				SET BranchName='$Name',
				RestaurantID='$Rid'
				WHERE BranchID='$Bid'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='RecordBranch.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Update Branch
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			BranchID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtBranchID" value="<?php echo $Bid?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtName" value="<?php echo $BName?>" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Restaurant
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "Restaurant is required">
		<select name="cboRestaurant"  required>
 								<option><?php echo $Rid?></option>
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