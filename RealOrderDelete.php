<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from order1 where OrderID='$id'";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Order Delete'); 
		window.location.assign('OrderList.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>