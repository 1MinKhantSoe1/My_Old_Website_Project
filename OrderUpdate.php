<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForOrderUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM order1 o, customer c WHERE o.CustomerID=c.CustomerID And OrderID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$Oid=$row['OrderID'];
		$CName=$row['CustomerID'];
		$OD=$row['OrderDate'];
		$a=$row['TotalAmount'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtOID'];
		$CustomerID=$_POST['cboCustomer'];
		$TD=$_POST['txtdate'];
		$amount=$_POST['txtAmount'];


		$select="SELECT * FROM order1 Where CustomerID='$CustomerID'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Customer Already Exist')</script>";
		}

		else
		{	
			// if (isset($_FILES['imgFood']['name']) && ($_FILES['imgFood']['name']!="") OR ($_FILES['imgFull']['name']) && ($_FILES['imgFull']['name']!="")) 
			// {
			// 	$temp=$_FILES['imgFood']['tmp_name'];
			// 	$temp1=$_FILES['imgFull']['tmp_name'];
			// 	$PN=$_FILES['imgFood']['name'];
			// 	$PN1=$_FILES['imgFull']['name'];

			// 	unlink("FoodImages/$PN");
			// 	unlink("FullImages/$PN1");

			// 	move_uploaded_file($temp, "FoodImages/$PN");
			// 	move_uploaded_file($temp1, "FullImages/$PN1");
			// }
			// else
			// {
			// 	$PN=$old_image;
			// 	$PN1=$old_image;
			// }
			 $ret1=mysqli_query($connectfooddb,
			 	"update order1
				SET CustomerID='$CustomerID',
				OrderDate='$TD',
				TotalAmount='$amount'
				WHERE OrderID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='OrderList.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w" enctype="multipart/form-data">
	<span class="login100-form-title p-b-53">
		Update Order
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			OrderID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtOID" value="<?php echo $Oid?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Customer ID
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboCustomer" required>
 								<option><?php echo $CName?></option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM customer");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$Name=$data['Name'];
 											$CustomerID=$data['CustomerID'];

 											echo "<option value='$CustomerID'>$Name</option>";
 										}
 								 	?>
 		</select>
		<span class="focus-input100"></span>
	</div>
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Order Date
		</span>
	</div>
	<div class="wrap-input101 validate-input">
		<input type="text" name="txtdate" value="<?php echo date('Y-m-d') ?>">
		<span class="focus-input100"></span>
	</div>
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Total Amount
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Price is required">
		<input class="input100" type="text" name="txtAmount" value="<?php echo $a?>" required onkeypress="isInputNumber(event)">
		<span class="focus-input100"></span>
	</div>
	<script type="text/javascript">
		function isInputNumber(evt)
		{
			var ch= String.fromCharCode(evt.which);

			if(!(/[0-9]/.test(ch)))
			{
				evt.preventDefault();
			}
		}
	</script>
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="submit" value="Update" name="btnUpdate" class="login100-form-btn">
		
	</div>
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="reset" value="Cancel" name="btnCancel" class="login100-form-btn">
		
	</div>
	<div class="w-full text-center p-t-55">
		
	</div>

</form>
<?php
include ('footer.php');
?>