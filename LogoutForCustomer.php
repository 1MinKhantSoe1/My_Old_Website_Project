<?php
session_start();

include('ConnectForFooddb.php');

?>

<div style="display: none">

<?php
	if ($_SESSION['CustomerID'] == '') 
	{
		echo"<script>alert('There is no account to logout !')</script>";
		echo "<script>location='MainForm.php'</script>";
	}

	else
	{
		echo"<script>alert('Logout')</script>";
		echo "<script>location='CustomerLogin.php'</script>";	
	}
?>
</div>

<?php

	

session_destroy();



?>
