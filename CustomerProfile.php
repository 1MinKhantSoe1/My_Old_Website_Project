<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForRestaurantDisplay.php');

	if (!isset($_SESSION['CustomerID'])) 
	{	
	echo "<script> alert('Please Login First'); window.location.assign('CustomerLogin.php'); </script>";
	}

	if (isset($_SESSION['CustomerID'])) 
	{

		$id=$_SESSION['CustomerID'];

		// echo $id;
		$select1="SELECT * FROM customer WHERE CustomerID='".$id."'";
		$ret=mysqli_query($connectfooddb,$select1);
		$row=mysqli_fetch_array($ret);

		// $cid=$row['CustomerID'];
		$name=$row['UserName'];
		$email=$row['Email'];
		$Password=$row['Password'];
		$PhoneNumber=$row['PhoneNumber'];
		$Address=$row['Address'];
		$TownShip=$row['TownShip'];
	}

	if (isset($_POST['btnSave'])) 
	{
		$id=$_POST['txtid'];
		$Name=$_POST['txtusername'];
		$email=$_POST['txtemail'];
		$PhoneNumber=$_POST['txtPhoneNumber'];
		$address=$_POST['txtAddress'];
		$Township=$_POST['txtTownship'];


		$select="SELECT * FROM customer Where UserName='$Name' and Email='$email'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Staff Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update customer
				SET UserName='$Name',Email='$email',PhoneNumber='$PhoneNumber',
				Address='$address',
				TownShip='$Township'
				WHERE CustomerID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert(' Save Successfully ! Please Login Again For Your Update Information. Thank You !')</script>";
				echo "<script>location='CustomerLogin.php'</script>";
				session_destroy();
				
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}
	if (isset($_POST['btnUpdatePassword'])) 
	{
		echo "<script>location='CustomerPasswordUpdate.php'</script>";
	}

 ?>
 <div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
          <figure class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">
          <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
<form action="CustomerProfile.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
	<i class='fas fa-user'></i> Profile
	</span>

	<input class="input100" type="hidden" name="txtid" value="<?php echo $id?>">
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			User Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtusername" value="<?php echo $name?>" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Email
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtemail" value="<?php echo $email?>" required>
		<span class="focus-input100"></span>
	</div>

	<div class="w-full text-center p-t-55">
		
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Password
		</span>
	</div>
	

	<div class="container1-login100-form-btn m-t-17">
		
			<input type="submit" value="Update Password" name="btnUpdatePassword" class="login100-form-btn">
		
	</div>
	
	<div class="w-full text-center p-t-55">
		
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Phone Number
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtPhoneNumber"  value="<?php echo $PhoneNumber ?>" required onkeypress="isInputNumber(event)">
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

	<div class="w-full text-center p-t-55">
		
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtAddress"  value="<?php echo $Address ?>" required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="w-full text-center p-t-55">
		
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Township
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="text" name="txtTownship"  value="<?php echo $TownShip ?>" required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="w-full text-center p-t-55">
		
	</div>

	
	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Save" name="btnSave" class="login100-form-btn">
		
	</div>
	<div class="w-full text-center p-t-55">
		
	</div>

</form>
</div>
</figure>
</div>
</div>
</div>
<?php
include ('FooterForCustomerMainForm.php');
?>