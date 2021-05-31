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
		$Password=$row['Password'];
	}

	if (isset($_POST['btnUpdate'])) 
		{
			$currentpassword=$_POST['txtcurrentpassword'];
			$NewPassword=$_POST['txtnewpassword'];
			$ConfirmNewPassword=$_POST['txtconfirmpassword'];
			

			$select="SELECT * FROM customer Where Password='$currentpassword'";
			$run=mysqli_query($connectfooddb,$select);
			$count=mysqli_num_rows($run);

			if ($count>0) 
			{
				if ($NewPassword==$ConfirmNewPassword) 
				{
					$ret1=mysqli_query($connectfooddb,
				 	"update customer
					SET Password='$ConfirmNewPassword'
					WHERE CustomerID='$id'");
		
					if ($ret1) 
					{
						
						echo "<script>alert('Password Update Successfully')</script>";
						echo "<script>location='CustomerProfile.php'</script>";
					}
					else
					{
						echo mysqli_error($connectfooddb);
					}
				}
				else
				{
					echo "<script>alert('New Password and Confirm New Password are different ! Please make sure same password !')</script>";
				}
				// echo "<script>alert('This Food Type is Already Exist')</script>";
			}

			else
			{
				echo "<script>alert('Wrong Current Password ! Please try again !')</script>";
			}
		
		}

	
 ?>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
        	<figure class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">
        	<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
<form action="CustomerPasswordUpdate.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
	<i class='fas fa-user'></i> Update Password	
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Current Password
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="Password" name="txtcurrentpassword"  required>
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			New Password
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="Password" name="txtnewpassword"  required>
		<span class="focus-input100"></span>
	</div>
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Confirm New Password
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Type is required">
		<input class="input100" type="Password" name="txtconfirmpassword"  required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="w-full text-center p-t-55">
		
	</div>

	
	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Update" name="btnUpdate" class="login100-form-btn">
		
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