<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from food where FoodID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Food Delete'); 
		window.location.assign('RecordFood.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>