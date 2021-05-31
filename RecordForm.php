<?php 
	
	
	session_start();

	include('ConnectForFooddb.php');
	include('HeaderForRecordForm.php');

	if (!isset($_SESSION['AdminID'])) 
	{	
	echo "<script> alert('Please Login First'); window.location.assign('Login.php'); </script>";
	}

	if (isset($_POST['btnFoodType'])) 
	{
		
			echo "<script>location='RecordFoodType.php'</script>";
		
	}

	elseif (isset($_POST['btnFood'])) 
	{
		echo "<script>location='RecordFood.php'</script>";
	}

	elseif (isset($_POST['btnRestaurant'])) 
	{
		echo "<script>location='RecordRestaurant.php'</script>";
	}


	elseif (isset($_POST['btnTownship'])) 
	{
		echo "<script>location='RecordTownship.php'</script>";
	}

	elseif (isset($_POST['btnStaff'])) 
	{
		echo "<script>location='RecordStaff.php'</script>";
	}
	// }
	// else
	// {
	// 	echo "<script>location='Login.php'</script>";
	// }
	
 ?>

          	
<form action="RecordForm.php" method="post" class="login100-form validate-form flex-sb flex-w">
	
	
	
	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Record Food Type" name="btnFoodType" class="login100-form-btn">
		
	</div>

	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Record Restaurant" name="btnRestaurant" class="login100-form-btn">
		
	</div>	
	
	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Record Food" name="btnFood" class="login100-form-btn">
		
	</div>


	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Record Township" name="btnTownship" class="login100-form-btn">
		
	</div>

	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Record Staff" name="btnStaff" class="login100-form-btn">
		
	</div>
	
	<div class="container-login100-form-btn m-t-17">
		
			
	</div>


</form>




<?php
include ('footer.php');
?>

