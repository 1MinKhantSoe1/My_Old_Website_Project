<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForFoodUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM food f, foodtype1 ft, restaurant1 r WHERE ft.FoodTypeID=f.FoodTypeID And r.RestaurantID=f.RestaurantID and FoodID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$Foodid=$row['FoodID'];
		$FoodName=$row['FoodName'];
		$Tid=$row['Type'];
		$Rid=$row['Name'];
		$Price=$row['Price'];
		$D=$row['Description'];
		$Fimg=$row['FoodImage'];
		$Fuimg=$row['FullImage'];
		$ManufactureDate=$row['ManufactureDate'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtFoodID'];
		$FoodName=$_POST['txtFoodName'];
		$Tid=$_POST['cboFoodType'];
		$Rid=$_POST['cboRestaurant'];
		$Price=$_POST['txtPrice'];
		$D=$_POST['txtDescription'];
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
			echo "<script>alert('Food Already Exist')</script>";
		}

		else
		{	
			
			 $ret1=mysqli_query($connectfooddb,
			 	"update food
				SET FoodName='$FoodName',
				FoodTypeID='$Tid',
				RestaurantID='$Rid',
				Price='$Price',
				Description='$D',
				FoodImage='$filename',
				FullImage='$filename2',
				ManufactureDate='$Mfdate'
				WHERE FoodID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='RecordFood.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="FoodUpdate.php" method="post" class="login100-form validate-form flex-sb flex-w" enctype="multipart/form-data">
	<span class="login100-form-title p-b-53">
		Update Food
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			FoodID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtFoodID" value="<?php echo $id?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Food Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtFoodName" value="<?php echo $FoodName?>" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			FoodType
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboFoodType" required>
 								<option><?php echo $Tid?></option>
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
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Price
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Price is required">
		<input class="input100" type="text" name="txtPrice" value="<?php echo $Price?>" required onkeypress="isInputNumber(event)">
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
			FoodImage :		<!-- <img src="FullImages/<?php echo $Fimg?>" style="width:150px;height:100px"> -->
							<input type="file" name="imgFood" >
		</span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			FullImage :		<!-- <img src="FoodImages/<?php echo $Fuimg?>" style="width:150px;height:100px"> -->
							<input type="file" name="imgFull" >
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
		<textarea class="input100" type="textarea" name="txtDescription" required ><?php echo $D?></textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Manufacture Date
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="date" name="txtMFDate" required value="<?php echo $ManufactureDate?>">
		<span class="focus-input100"></span>
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