<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from foodtype1 where FoodTypeID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Type Delete'); 
		window.location.assign('RecordFoodType.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>