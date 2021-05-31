<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from admintable1 where AdminID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Admin Delete'); 
		window.location.assign('DisplayAdminRegister.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>