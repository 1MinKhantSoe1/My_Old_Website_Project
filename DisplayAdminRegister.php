<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForAdminList.php');

	
		if (isset($_POST['btnSearch'])) 
		{
			$input=$_POST['txtSearch'];

			$select=mysqli_query($connectfooddb,"SELECT * FROM admintable1 WHERE AdminID='$input' OR (AdminName LIKE '%$input%') OR (Password LIKE '%$input%') OR (Role LIKE '%$input%')");
			$count=mysqli_num_rows($select);

			if ($count==0)
			{
				echo "<script>alert('Not Found!')</script>";
				echo "<script>location='DisplayAdminRegister.php'</script>";
			}
		}
		else
		{

			$select=mysqli_query($connectfooddb,"SELECT * FROM admintable1");
		}
	
 ?>

 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	
 	<script>
	$(document).ready( function () {
		$('#tableid').DataTable();
	} );
</script>

 	<section class="section-table cid-riZXhxTY2u" id="table1-3">
	<div class="container container-table">
		
		<div class="table-wrapper">
    	<div class="container scroll">
 			<table id="tableid" class="display">
		 		<thead>

		 		<tr class="table-heads">
		 			<th class="head-item mbr-fonts-style display-7">AdminID</th>
		 			<th class="head-item mbr-fonts-style display-7">AdminName</th>
		 			<th class="head-item mbr-fonts-style display-7">Email</th>
		 			<th class="head-item mbr-fonts-style display-7">Password</th>
		 			<th class="head-item mbr-fonts-style display-7">Role</th>
		 			<th class="head-item mbr-fonts-style display-7">Action</th>
		 		</tr>
		 		</thead>
		 		<tbody>
			 		<?php 

			 			
			 			$count=mysqli_num_rows($select);
			 				
			 				for ($i=0; $i <$count ; $i++) 
			 					{ 
			 						$row=mysqli_fetch_array($select);
			 						//Fetch loke tl so tr array tway ko pyan swel htoke tr//
			 						$id=$row['AdminID'];
			 						$fn=$row['AdminName'];
			 						$em=$row['Email'];
			 						$ln=$row['Password'];
			 						$ro=$row['Role'];
			 						echo "<tr>";
			 						echo "<td>$id</td>";
			 						echo "<td>$fn</td>";
			 						echo "<td>$em</td>";
			 						echo "<td>$ln</td>";
			 						echo "<td>$ro</td>";
			 						echo " 	<td>
											<a class='btnDelete'href='AdminDelete.php?ID=$id'>Delete</a>
											
											<a class='btnUpdate' href='AdminUpdate.php?ID=$id'>Update</a>
											</td>";
			 						echo "</tr>";
			 					}	
			 		 ?>
			 		 </tbody>
			 	</table>
			 	</div>
			</div>
		</div>
 	
</section>
<br>
<br>

 </body>
 </html>
 <?php
include ('footerforAdminList.php');
?>