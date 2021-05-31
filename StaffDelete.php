<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from staff where StaffID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Staff Delete'); 
		window.location.assign('RecordStaff.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>