<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForFoodTypeUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM foodtype1 WHERE FoodTypeID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$FoodTypeid=$row['FoodTypeID'];
		$Type=$row['Type'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtTypeID'];
		$Type=$_POST['txtType'];


		$select="SELECT * FROM foodtype1 Where Type='$Type'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('FoodType Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update foodtype1
				SET Type='$Type'
				WHERE FoodTypeID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='RecordFoodType.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="FoodTypeUpdate.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Update FoodType
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Food Type ID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtTypeID" readonly value="<?php echo $id?>">
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Type
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtType" value="<?php echo $Type?>" required>
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