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
			$FoodName=$_POST['txtFoodName'];
			$FoodTypeID=$_POST['cboFoodType'];
			$RestaurantID=$_POST['cboRestaurant'];
			$Price=$_POST['txtPrice'];
			$Description=$_POST['txtDescription'];
			// $FoodImg=$_FILES['imgFood']['name'];
			// $FullImg=$_FILES['imgFull']['name'];
			$Mfdate=$_POST['txtMFDate'];
			
			$image=$_FILES['imgFood']['name'];
			$folder="FoodImages/";
			if($image)
			{
				$filename=$folder."_".$image;
				$copied=copy($_FILES['imgFood']['tmp_name'],$filename);
				if(!$copied)
				{
					exit("Problem Image Load");
				}
			}

		$image2=$_FILES['imgFull']['name'];
		$folder2="FullImages/";
		if($image2)
		{
			$filename2=$folder2."_".$image2;
			$copied2=copy($_FILES['imgFull']['tmp_name'],$filename2);
			if(!$copied2)
			{
				exit("Problem Image Load");
			}
		}

			$select="SELECT * FROM food Where FoodName='$FoodName'";
			$run=mysqli_query($connectfooddb,$select);
			$count=mysqli_num_rows($run);

			if ($count>0) 
			{
				echo "<script>alert('This Food is Already Exist')</script>";
			}
			else
			{	
				$insert=mysqli_query($connectfooddb,"INSERT INTO food (FoodName,FoodTypeID,RestaurantID,Price,Description,FoodImage,FullImage,ManufactureDate) VALUES ('$FoodName','$FoodTypeID','$RestaurantID','$Price','$Description','$filename','$filename2','$Mfdate')");
				if ($insert) 
				{

					echo "<script>alert('Save Successfully')</script>";
					echo "<script>location='RecordFood.php'</script>";
				}
				else
				{
					echo mysqli_error($connectfooddb);
				}


			}

				

			
	}
	
 ?>
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w" enctype="multipart/form-data">
	<span class="login100-form-title p-b-53">
		Record Food
	</span>
	
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Food Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtFoodName" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			FoodType
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboFoodType" required>
 								<option>Choose Food Type</option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM foodtype1");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$Type=$data['Type'];
 											$FoodTypeID=$data['FoodTypeID'];

 											echo "<option value='$FoodTypeID'>$Type</option>";
 										}
 								 	?>
 		</select>
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
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Price
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Price is required">
		<input class="input100" type="text" name="txtPrice" required onkeypress="isInputNumber(event)">
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
			FoodImage :		<input type="file" name="imgFood">
		</span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			FullImage :		<input type="file" name="imgFull">
		</span>
	</div>

	<div class="w-full text-center p-t-55">
		
	</div>
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Description
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food is required">
		<textarea class="input100" type="textarea" name="txtDescription"></textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Manufacture Date
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="date" name="txtMFDate" required>
		<span class="focus-input100"></span>
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
include ('footerforfood.php');
?>