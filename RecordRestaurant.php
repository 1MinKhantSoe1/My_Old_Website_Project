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
		$RestaurantName=$_POST['txtRestaurantName'];
		$Address=$_POST['txtAddress'];
		$PhoneNumber=$_POST['txtPhoneNumber'];
		$Township=$_POST['cboTownship'];
		// $LogoImg=$_FILES['imgLogo']['name'];

		$image=$_FILES['imgLogo']['name'];
			$folder="LogoImages/";
			if($image)
			{
				$filename=$folder."_".$image;
				$copied=copy($_FILES['imgLogo']['tmp_name'],$filename);
				if(!$copied)
				{
					exit("Problem Image Load");
				}
			}
			
		$select="SELECT * FROM restaurant1 Where Name='$RestaurantName'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('This Restaurant is Already Exist')</script>";
		}

		else
		{
			$insert=mysqli_query($connectfooddb,"INSERT INTO restaurant1 (Name,Address,TownshipID,PhoneNumber,LogoImages) VALUES('$RestaurantName','$Address','$Township','$PhoneNumber','$filename')");
		
		if ($insert) 
		{
			
			echo "<script>alert('Save Successfully')</script>";
			echo "<script>location='RecordRestaurant.php'</script>";
		}
		else
		{
			echo mysqli_error($connectfooddb);
		}
		}

		
		
	}
 ?>
<form action="RecordRestaurant.php" method="post" class="login100-form validate-form flex-sb flex-w" enctype="multipart/form-data">
	<span class="login100-form-title p-b-53">
		Record Restaurant
	</span>
	
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Restaurant Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Restaurant Name is required">
		<input class="input100" type="text" name="txtRestaurantName" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Address Name is required">
		<textarea class="input100" type="textarea" name="txtAddress" required></textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Township
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboTownship" required>
 								<option>Choose Township</option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM township");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$T=$data['TownshipName'];
 											$TID=$data['TownshipID'];

 											echo "<option value='$TID'>$T</option>";
 										}
 								 	?>
 		</select>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Phone Number
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Phone Number is required">
		<input class="input100" type="text" name="txtPhoneNumber" required onkeypress="isInputNumber(event)">
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
			LogoImage :		<input type="file" name="imgLogo">
		</span>
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
include ('footerforrestaurant.php');
?>