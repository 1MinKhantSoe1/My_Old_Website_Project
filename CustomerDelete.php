<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from customer where CustomerID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Customer Delete'); 
		window.location.assign('RecordCustomer.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>