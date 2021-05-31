<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from temporder where FoodID='$id'";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Temp Order Delete'); 
		window.location.assign('CheckOut.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>