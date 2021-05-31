<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForCustomerUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM customer c, township t WHERE c.TownshipID=t.TownshipID and CustomerID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$Cid=$row['CustomerID'];
		$Tid=$row['TownshipName'];
		$Name=$row['Name'];
		$p=$row['PhoneNumber'];
		$a=$row['Address'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtCustomerID'];
		$CName=$_POST['txtCustomerName'];
		$Tid=$_POST['cboTownship'];
		$P=$_POST['txtPhoneNumber'];
		$a=$_POST['txtAddress'];


		$select="SELECT * FROM customer Where Name='$CName'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('Customer Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update customer
				SET Name='$CName',
				TownshipID='$Tid',
				PhoneNumber='$P',
				Address='$a'
				WHERE CustomerID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='RecordCustomer.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Update Customer
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			CustomerID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtCustomerID" value="<?php echo $Cid?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Customer Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtCustomerName" value="<?php echo $Name?>" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			TownshipID
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboTownship" required>
 								<option><?php echo $Tid?></option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM township");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$TName=$data['TownshipName'];
 											$Tsid=$data['TownshipID'];

 											echo "<option value='$Tsid'>$TName</option>";
 										}
 								 	?>
 		</select>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			PhoneNumber
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Price is required">
		<input class="input100" type="text" name="txtPhoneNumber" value="<?php echo $p?>" required onkeypress="isInputNumber(event)">
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
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Address
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food is required">
		<textarea class="input100" type="textarea" name="txtAddress" ><?php echo $a?></textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="w-full text-center p-t-55">
		
	</div>

	
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