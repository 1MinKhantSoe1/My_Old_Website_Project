<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from branch where BranchID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Branch Delete'); 
		window.location.assign('RecordBranch.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>