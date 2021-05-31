<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from restaurant1 where RestaurantID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Restaurant Delete'); 
		window.location.assign('RecordRestaurant.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>