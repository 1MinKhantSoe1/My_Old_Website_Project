<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForRestaurantUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM restaurant1 r, township t WHERE r.TownshipID=t.TownshipID and RestaurantID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$id=$row['RestaurantID'];
		$Name=$row['Name'];
		$a=$row['Address'];
		$t=$row['TownshipName'];
		$p=$row['PhoneNumber'];
		$l=$row['LogoImages'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtRestaurantID'];
		$Name=$_POST['txtRestaurantName'];
		$ad=$_POST['txtAddress'];
		$t=$_POST['cboTownship'];
		$p=$_POST['txtPhoneNumber'];
		// $logo=$_FILES['imgLogo']['name'];


		$image=$_FILES['imgFood']['name'];
			$folder="LogoImages/";
			if($image)
			{
				$filename=$folder."_".$image;
				$copied=copy($_FILES['imgFood']['tmp_name'],$filename);
				if(!$copied)
				{
					exit("Problem Image Load");
				}
			}

		$select="SELECT * FROM restaurant1 Where Name='$Name'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Restaurant Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update restaurant1
				SET Name='$Name',
				Address='$ad',
				TownshipID='$t',
				PhoneNumber='$p',
				LogoImages='$filename'
				WHERE RestaurantID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='RecordRestaurant.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="RestaurantUpdate.php" method="post" class="login100-form validate-form flex-sb flex-w"  enctype="multipart/form-data">
	<span class="login100-form-title p-b-53">
		Update Restaurant
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			RestaurantID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Restaurant Name is required">
		<input class="input100" type="text" name="txtRestaurantID" value="<?php echo $id?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Restaurant Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Restaurant Name is required">
		<input class="input100" type="text" name="txtRestaurantName" value="<?php echo $Name?>" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Address Name is required">
		<textarea class="input100" type="textarea" name="txtAddress" required ><?php echo $a?></textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Township
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboTownship" required>
 								<option><?php echo $t?></option>
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
		<input class="input100" type="text" name="txtPhoneNumber" value="<?php echo $p?>" onkeypress="isInputNumber(event)" required>
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
			LogoImage :		<!-- <img src="LogoImages/<?php echo $l?>" style="width:150px;height:100px"> -->
							<input type="file" name="imgFood" >
		</span>
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