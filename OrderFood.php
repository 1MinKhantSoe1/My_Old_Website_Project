<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForRestaurantDisplay.php');

	include('AutoID.php');


if (!isset($_SESSION['CustomerID'])) 
{
	echo "<script> alert('Please Login First'); window.location.assign('CustomerLogin.php'); </script>";
}

	
	if (isset($_REQUEST['fid'])) 
	{
		$fid=$_REQUEST['fid'];
		$select=mysqli_query($connectfooddb,"Select * 
				From restaurant1 r, foodtype1 ft,food f 
				where r.RestaurantID=f.RestaurantID and ft.FoodTypeID=f.FoodTypeID 
				and f.FoodID=$fid");

		$row=mysqli_fetch_array($select);
		$FoodName=$row['FoodName'];
		$FoodID=$row['FoodID'];
		$RestaurantName=$row['Name'];
		$Description=$row['Description'];
		$Price=$row['Price'];
		$FoodType=$row['Type'];
		$Image=$row['FullImage'];

	}

	
	if (isset($_POST['btnAdd'])) 
	{
		
	$OID=$_POST['txtOID'];
	$fid=$_POST['txtFoodID'];
	$qty=$_POST['txtQty'];

	$select="select * from temporder where FoodID=$fid";
	$ret=mysqli_query($connectfooddb,$select);
	$count=mysqli_num_rows($ret);

	if ($count==0)
	{
		$insert="insert into temporder (OrderID,FoodID,Qty) values ('$OID','$fid','$qty')";
		$ret=mysqli_query($connectfooddb,$insert);
	}
		else
		{
			$update="
					update temporder 
					set Qty=Qty+$qty
					where FoodID=$fid
					";
			$ret=mysqli_query($connectfooddb,$update);
		}

		if ($ret)
		{
			echo "<script> alert('Add'); window.location.assign('CheckOut.php');</script>";
		}
		else
		{
			echo mysqli_error($connectfooddb);
		}
	}
		
	
 ?>
 <div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
          
          <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w" onsubmit="return checkforblank()">

	<input class="input100" type="hidden" name="txtOID" required value="<?php echo AutoID("order1","OrderID","Order_",3)?>" readonly>

	<span class="login100-form-title p-b-53">
		Order
	</span>
	
	<div class="p-t-31 p-b-9 p-l-110 p-r-110">
		<img class="border" src="<?php echo $Image?>" width="250px" height="250px">
	</div>

	<input class="input100" type="hidden" name="txtFoodID" value="<?php echo $FoodID ?>" readonly>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Food Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtFoodName" value="<?php echo $FoodName ?>" readonly>
		<span class="focus-input100"></span>
	</div>

	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Restaurant Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtRestaurantName" value="<?php echo $RestaurantName ?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Description
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "Food Name is required">
		<textarea class="change" name="txtDescription" readonly>
		<?php 
			echo "$Description";
		 ?>
		 </textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Food Type
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtFoodType" value="<?php echo $FoodType ?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Price
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtPrice" value="<?php echo $Price ?>" readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Qty
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="number" name="txtQty" max="100" min="1" onkeypress="isInputNumber(event)" required>
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
		
			<input type="submit" value="add" name="btnAdd" class="login100-form-btn">
		
	</div>
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="reset" value="Cancel" name="btnCancel" class="login100-form-btn">
		
	</div>

	
	<div class="w-full text-center p-t-55">
		
	</div>

	
	
	</div>
  </div>
</div>
</form>
<?php
include ('FooterForCustomerMainForm.php');
?>

