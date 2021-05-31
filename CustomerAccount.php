<?php 
	
	
	session_start();

	include('ConnectForFooddb.php');
	include('HeaderForRestaurantDisplay.php');

	if (!isset($_SESSION['CustomerID'])) 
	{	
	echo "<script> alert('Please Login First'); window.location.assign('CustomerLogin.php'); </script>";
	}

	if (isset($_POST['btnProfile'])) 
	{
		
			echo "<script>location='CustomerProfile.php'</script>";
		
	}

	elseif (isset($_POST['btnLogout'])) 
	{
		echo "<script>location='LogoutForCustomer.php'</script>";
	}


 ?>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
          
          <figure class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">

          <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

          	
          	
<form action="CustomerAccount.php" method="post" class="login100-form validate-form flex-sb flex-w">
	
	
	
	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Profile" name="btnProfile" class="login100-form-btn">
		
	</div>

	
	<div class="container-login100-form-btn m-t-17">
		
			<input type="submit" value="Logout" name="btnLogout" class="login100-form-btn">
		
	</div>

	
	<div class="container-login100-form-btn m-t-17">
		
			
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

