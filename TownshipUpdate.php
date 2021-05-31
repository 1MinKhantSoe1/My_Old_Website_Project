<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForTownshipUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM township WHERE TownshipID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$Tid=$row['TownshipID'];
		$TName=$row['TownshipName'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtTownshipID'];
		$Name=$_POST['txtName'];


		$select="SELECT * FROM township Where TownshipName='$Name'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Township Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update township
				SET TownshipName='$Name'
				WHERE TownshipID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='RecordTownship.php'</script>";
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
		Update Township
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			TownshipID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtTownshipID" readonly value="<?php echo $Tid?>">
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtName" value="<?php echo $TName?>" required>
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