<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForAllDisplay.php');
	
	if (isset($_POST['btnSave'])) 
	{
			$CName=$_POST['txtCustomerName'];
			$TownshipID=$_POST['cboTownship'];
			$PhoneNumber=$_POST['txtPhoneNumber'];
			$Address=$_POST['txtAddress'];

			$select="SELECT * FROM customer Where Name='$CName'";
			$run=mysqli_query($connectfooddb,$select);
			$count=mysqli_num_rows($run);

			if ($count>0) 
			{
				echo "<script>alert('This Customer is Already Exist')</script>";
			}
			else
			{	
				$insert=mysqli_query($connectfooddb,"INSERT INTO customer (Name,TownshipID,PhoneNumber,Address) VALUES ('$CName','$TownshipID','$PhoneNumber','$Address')");
				if ($insert) 
				{
					echo "<script>alert('Save Successfully')</script>";
					echo "<script>location='RecordCustomer.php'</script>";
				}
				else
				{
					echo mysqli_error($connectfooddb);
				}
			}	
			
	}
	
 ?>
<form action="RecordCustomer.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Record Customer
	</span>
	
	

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Customer Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtCustomerName" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Township
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboTownship" required>
 								<option>Choose Township</option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM township");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$TName=$data['TownshipName'];
 											$TID=$data['TownshipID'];

 											echo "<option value='$TID'>$TName</option>";
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
		<input class="input100" type="text" name="txtPhoneNumber" required onkeypress="isInputNumber(event)">
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
		<textarea class="input100" type="textarea" name="txtAddress" required></textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="w-full text-center p-t-55">
		
	</div>

	
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="submit" value="Save" name="btnSave" class="login100-form-btn">
		
	</div>
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="reset" value="Cancel" name="btnCancel" class="login100-form-btn">
		
	</div>
	<div class="w-full text-center p-t-55">
		
	</div>

</form>
<?php
include ('footerforcustomer.php');
?>