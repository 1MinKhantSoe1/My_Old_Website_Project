<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForAdminList.php');

	include('AutoID.php');

	if (!isset($_SESSION['AdminID'])) 
	{	
	echo "<script> alert('Please Login First'); window.location.assign('Login.php'); </script>";
	}
	

if (isset($_POST['btndelivery'])) 
{

?>
<div style="display: none">
<?php  
	if ($_POST['status'] == '') 
	{
?>
</div>
<?php  
		echo "<script> alert('Please ! Check the checkbox');</script>";
	}
	elseif (isset($_POST['status'])) 
	{
	
		foreach ( $_POST['status'] as $oid ) 
		{

			$cid=$_POST['cboStaff'];


			$update="Update order1 
			set OrderStatus='Delivered',
				StaffID=$cid
			 where OrderID='$oid'";
			$ret=mysqli_query($connectfooddb,$update);

			echo "<script> alert('Dlivered');window.location.assign('OrderList.php'); </script>";
		}
	}
	
}
		
		if (isset($_POST['btnSearch'])) 
		{
			$rdoSearchType=$_POST['rdoSearchType'];

				if ($rdoSearchType == 1) 
				{
					$lstOrderID=$_POST['lstOrderID'];

					$query="SELECT o.*, c.CustomerID,c.UserName 
							from Customer c, order1 o
							WHERE o.OrderID='$lstOrderID'
							and c.CustomerID=o.CustomerID
							";
					$ret=mysqli_query($connectfooddb,$query);
					$count=mysqli_num_rows($ret);
				}
				elseif ($rdoSearchType == 2) 
				{
					$txtFrom=date('Y-m-d',strtotime($_POST['txtFrom']));
					$txtTo=date('Y-m-d',strtotime($_POST['txtTo']));

					$query="SELECT o.*, c.CustomerID,c.UserName 
							from Customer c, order1 o
							WHERE o.OrderDate BETWEEN '$txtFrom' AND '$txtTo'
							and c.CustomerID=o.CustomerID
							";
					$ret=mysqli_query($connectfooddb,$query);
					$count=mysqli_num_rows($ret);
				}
				else
				{
					$cboStatus=$_POST['cboStatus'];

					$query="SELECT o.*, c.CustomerID,c.UserName 
							from Customer c, order1 o
							WHERE o.OrderStatus='$cboStatus'
							and c.CustomerID=o.CustomerID
							";
					$ret=mysqli_query($connectfooddb,$query);
					$count=mysqli_num_rows($ret);
				}
		}

		elseif (isset($_POST['btnShowAll'])) 
		{
			
			$ret=mysqli_query($connectfooddb,"Select o.*,c.CustomerID,c.UserName 
			from Customer c, order1 o
			where c.CustomerID=o.CustomerID
			");
			$count=mysqli_num_rows($ret);

		}

		else
		{

			$TodayDate=date("Y-m-d");

			$select1=	"select o.*,c.CustomerID,c.UserName 
						from order1 o,Customer c
						where o.OrderDate='$TodayDate'
						and c.CustomerID=o.CustomerID
						";
			$ret=mysqli_query($connectfooddb,$select1);
			$count=mysqli_num_rows($ret);
		}
 ?>

 <script>
	$(document).ready( function () {
		$('#tableid').DataTable();
	} );
</script>

<section class="section-table cid-riZXhxTY2u" id="table1-3">
	<div class="container container-table">
		<div class="table-wrapper">
    	<div class="container scroll">
    		<form action="OrderList.php" method="post">
    			<fieldset>
    				<legend>Search Option : </legend>
 				<table>
		 			<tr>
						<td>
							<input type="radio" name="rdoSearchType" value="1" checked>Search By ID
							<br/>
							<div class="wrap-input105 validate-input" data-validate = "Admin Name is required">
							<input list="lstOrderID" name="lstOrderID" class="input102">
							</div>
							<datalist id="lstOrderID">
							<?php  
							$POquery="SELECT * FROM order1";
							$ret1=mysqli_query($connectfooddb,$POquery);
							$POcount=mysqli_num_rows($ret1); //Count Purchase Order Record

							for($i=0; $i < $POcount; $i++) 
							{ 
								$POrow=mysqli_fetch_array($ret1);
								//print_r($POrow);
								$OrderID=$POrow['OrderID'];
								echo "<option value='$OrderID'>";
							}
							?>
							</datalist>
						</td>

						<td>
							<input type="radio" name="rdoSearchType" value="2" >Search By Date
							<br/>
							<b>From :</b>
							<div class="wrap-input105 validate-input" data-validate = "Admin Name is required">
							<input type="text" name="txtFrom" value="<?php echo date('Y-m-d') ?>" 
							OnClick="showCalender(calender,this)" readonly class="input102"/>
							</div>
							<b>To :</b>
							<div class="wrap-input105 validate-input" data-validate = "Admin Name is required">
							<input type="text" name="txtTo" value="<?php echo date('Y-m-d') ?>" 
							OnClick="showCalender(calender,this)" readonly class="input102"/>
							</div>
						</td>

						<td>
							<input type="radio" name="rdoSearchType" value="3"/>Search By Status
							<br/>
							<select name="cboStatus">
								<option>Pending</option>
								<option>Purchase</option>
								<option>Delivered</option>
							</select>

						</td>
						<td>
							<br/>
							<input class='btnUpdate' type="submit" name="btnSearch" value="Search"/>
							<input class='btnUpdate' type="submit" name="btnShowAll" value="Show All"/>
							<input class='btnUpdate' type="reset" value="Clear"/> 
						</td>
					</tr>
			 	</table>
			 	</fieldset>
			 	<fieldset>
			 		<legend>Search Result :</legend>
			 		<?php 

			 			if ($count<1) 
			 			{
			 				echo "<p>No Order List Found</p>";
			 			}
			 			else
			 			{
			 		?>

				
      <br>

			 		<table id="tableid" class="display">
			 			<thead>
			 			<tr>
				 			<th>OrderID</th>
				 			<th>CustomerName</th>
				 			<th>OrderDate</th>
				 			<th>Address</th>
				 			<th>NewAddress</th>
				 			<th>NewPhoneNumber</th>
				 			<th>TotalAmount</th>
				 			<th>TotalQty</th>
				 			<th>OrderStatus</th>
				 			<th colspan="2">Action</th>
		 				</tr>
		 				</thead>
		 				<tbody>
		 				
		 				<?php 

			 				for ($i=0; $i <$count ; $i++) 
			 					{ 
			 						$row=mysqli_fetch_array($ret);
			 						//Fetch loke tl so tr array tway ko pyan swel htoke tr//
			 						$id=$row['OrderID'];
			 						// $fn=$row['CustomerID'];
			 						// $ln=$row['OrderDate'];
			 						// $ro=$row['TotalAmount'];
			 						// $qt=$row['TotalQty'];
			 						echo "<tr>";
			 						echo "<td>" . $row['OrderID'] . "</td>";
									echo "<td>" . $row['UserName'] . "</td>";
									echo "<td>" . $row['OrderDate'] . "</td>";
									echo "<td>" . $row['AddressStatus'] . "</td>";
									echo "<td>" . $row['NewAddress'] . "</td>";
									echo "<td>" . $row['NewPhoneNumber'] . "</td>";
									echo "<td>" . $row['TotalAmount'] . "</td>";
									echo "<td>" . $row['TotalQty'] . "</td>";
									echo "<td>" . $row['OrderStatus'] . "</td>";

									 $status=$row['OrderStatus'];


									if ($status=='Purchase')
									{
										echo "<td><input type='checkbox' value='$id' name='status[$i]'></td>";
									}

									elseif ($status == 'Pending' && $status !='Delivered') 
									{
										echo " <td>
											<a class='btnUpdate' href='OrderSearch.php'>Purchase</a>
											</td>";
									}

									elseif ($status=='Delivered')
									{
										echo " 	<td>
											<a class='btnUpdate' href='OrderDetail.php?OrderID=$id'>Detail</a>
											</td>";

									}

			 						
			 						echo "</tr>";
			 					}	
			 			?>
			 			</tbody>
			 		
			 				

									

			 			<tr>
			 				<td colspan="11" align="right">

							  	<select name="cboStaff" required>
						                <option>Choose Staff</option>
						                <?php 

						                    $select=mysqli_query($connectfooddb,"Select * from staff");

						                    $count=mysqli_num_rows($select);

						                    for ($i=0; $i<$count; $i++) 
						                    { 
						                      $data=mysqli_fetch_array($select);
						                      $FName=$data['StaffName'];
						                       $FID=$data['StaffID'];

						                      echo "<option value='$FID'>$FName</option>";
						                    }
						                  ?>
						      </select>
			 					<input type="submit" name="btndelivery" value="Delivery" class="btnUpdate2">
			 				</td>

			 			</tr>
			 			

			 			 
					</table>
			 		<?php	
			 			}
			 		 ?>
			 	</fieldset>
			 	<br>
			 	</form>
		</div>
	</div>
 </div>
</section>
<br>
<br>

 <?php
include ('footerforAdminList.php');
?>