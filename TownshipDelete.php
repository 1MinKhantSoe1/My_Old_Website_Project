<?php

include('ConnectForFooddb.php');

if (isset($_GET['ID'])) 
{
	$id=$_GET['ID'];
	$select="Delete from township where TownshipID=$id";
	$ret=mysqli_query($connectfooddb,$select);

	if ($ret)
	{
		echo "<script> alert('Township Delete'); 
		window.location.assign('RecordTownship.php');</script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}

}

?>