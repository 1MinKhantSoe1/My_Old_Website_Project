<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForOrder.php');

	include('AutoID.php');
	
	if (isset($_POST['btnOrder'])) 
	{
		$OID=$_POST['txtOID'];
		$cid=$_POST['cboCustomer'];
		$d=$_POST['txtdate'];
		$q=$_POST['txtQty'];
		$Amount=$_POST['txtAmount'];
		$TotalQty=$_POST['txtTotalQty'];	

		$select="select * from order1 where CustomerID=$cid";
		$ret1=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($ret1);
		if ($count==0) 
		{
			$insert="insert into order1 (OrderID,CustomerID,OrderDate,TotalAmount,TotalQty) values ('$OID','$cid','$d','$Amount','$TotalQty')";
			$ret1=mysqli_query($connectfooddb,$insert);
		}
		else
		{
			$update="
					update order1 
					set TotalAmount=TotalAmount+$Amount,
						TotalQty=TotalQty+$TotalQty
					where CustomerID=$cid
					";
			$ret1=mysqli_query($connectfooddb,$update);
		}

		$select="select * from temporder";
		$tempret=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($tempret);

	for ($i=0; $i < $count ; $i++) 
	{ 
		$row=mysqli_fetch_array($tempret);
		$Oid=$row['T_OrderID'];
		$Fid=$row['FoodID'];
		$OrderQty=$row['Qty'];

		$insert="insert into order_food (OrderID,FoodID,Quantity1) values ('$Oid','$Fid','$OrderQty')";
		$ret=mysqli_query($connectfooddb,$insert);

		$update="Update food
				set Quantity=Quantity+$OrderQty
				where FoodID='$Fid'
				";
		$ret=mysqli_query($connectfooddb,$update);

	}

	$delete="Delete from temporder";
	$ret=mysqli_query($connectfooddb,$delete);

	if ($ret)
	{
		echo "<script> alert('Order Success'); </script>";
	}
	else
	{
		echo mysqli_error($connectfooddb);
	}
}
	if (isset($_POST['btnAdd'])) 
	{
	
	$fid=$_POST['cboFood'];
	$qty=$_POST['txtQty'];

	$select="select * from temporder where FoodID=$fid";
	$ret=mysqli_query($connectfooddb,$select);
	$count=mysqli_num_rows($ret);

	if ($count==0)
	{
		$insert="insert into temporder (FoodID,Qty) values ('$fid','$qty')";
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
		echo "<script> alert('Add'); </script>";
	}
		else
		{
			echo mysqli_error($connectfooddb);
		}
	}
		// elseif (isset($_POST['btnSave'])) 
		// {
		// 		$CustomerID=$_POST['cboCustomer'];
		// 		$date=$_POST['txtdate'];
		// 		$Order=$_POST['txtOrder'];
		// 		$Qty=$_POST['txtQty'];
		// 		$Total=$_POST['txtTotalAmount'];

		// 		$select="SELECT * FROM order1 Where OrderName='$Order'";
		// 		$run=mysqli_query($connectfooddb,$select);
		// 		$count=mysqli_num_rows($run);

		// 		if ($count>0) 
		// 		{
		// 			echo "<script>alert('This Order is Already Exist')</script>";
		// 		}
		// 		else
		// 		{	
		// 			$insert=mysqli_query($connectfooddb,"INSERT INTO order1 (CustomerID,OrderDate,OrderName,Qty,TotalAmount) VALUES ('$CustomerID','$date','$Order','$Qty','$Total')");
		// 			if ($insert) 
		// 			{
		// 				echo "<script>alert('Save Successfully')</script>";
		// 				echo "<script>location='RecordOrder.php'</script>";
		// 			}
		// 			else
		// 			{
		// 				echo mysqli_error($connectfooddb);
		// 			}
		// 		}	
				
		// }
	
 ?>
 <div class="limiter">
    <div class="container-login100" style="background-image: url('images/backgraound.jpg');">
        <div class="back1forlogin">
          
          <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w" onsubmit="return checkforblank()">
	<span class="login100-form-title p-b-53">
		Record Order
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			OrderID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtOID" required value="<?php echo AutoID("order1","OrderID","Order_",3)?>" readonly>
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
			Restaurant
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboFood" required>
 								<option>Choose Restaurant</option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM restaurant1 ");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$FName=$data['Name'];
 											$FID=$data['RestaurantID'];

 											echo "<option value='$FID'>$FName</option>";
 										}
 								 	?>
 		</select>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Food
		</span>
	</div>
	<div class="wrap-input101 validate-input" data-validate = "FoodType is required">
		<select name="cboFood" required>
 								<option>Choose Food</option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM food");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$FName=$data['FoodName'];
 											$FID=$data['FoodID'];

 											echo "<option value='$FID'>$FName</option>";
 										}
 								 	?>
 		</select>
		<span class="focus-input100"></span>
	</div>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Qty
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtQty" onkeypress="isInputNumber(event)" >
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
<section class="saction3">
  	<div class="container">
<section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container container-table">
    <div class="table-wrapper">
      <div class="container scroll">
      <table class="table isSearch" cellspacing="0">
        <thead>

        <tr class="table-heads">
          <th class="head-item mbr-fonts-style display-7">FoodID</th>
          <th class="head-item mbr-fonts-style display-7">Qty</th>
          <th class="head-item mbr-fonts-style display-7">Price</th>
          <th class="head-item mbr-fonts-style display-7">Remove</th>
        </tr>
        </thead>
          <?php 

          $select1="select * 
		from temporder t,food f
		where t.FoodID=f.FoodID
		";
			$ret=mysqli_query($connectfooddb,$select1);
			$count=mysqli_num_rows($ret);
			$qu=0;
            $PaymentAmount=0;
              
              for ($i=0; $i <$count ; $i++) 
                { 
                  $row=mysqli_fetch_array($ret);
                  //Fetch loke tl so tr array tway ko pyan swel htoke tr//
                  $fid=$row['FoodID'];
                  $q=$row['Qty'];
                  $p=$row['Price'];
                  
                  $TotalAmount=$q*$p;

                  $PaymentAmount+=$TotalAmount;
                  $qu+=$q;

                  echo "<tr>";
                  echo "<td>$fid</td>";
                  echo "<td>$q</td>";
                  echo "<td>$p</td>";
                  echo "  <td>
                      <a class='btnDelete'href='OrderDelete.php?ID=$fid'>Remove</a>
                      </td>";
                  echo "</tr>";
                } 
           ?>
        </table>
        </div>
      </div>
    </div>
  
</section>

<h4>Total Amount</h4>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtAmount" required value="<?php echo $PaymentAmount ?>"  >
		<span class="focus-input100"></span>
	</div>

	<h4>Total Qty</h4>
	<div class="wrap-input100 validate-input" data-validate = "Food Name is required">
		<input class="input100" type="text" name="txtTotalQty" required value="<?php echo $qu ?>">
		<span class="focus-input100"></span>
	</div>

<div class="p-t-31 p-b-9">
		<span class="txt1">
			Customer
		</span>
	</div>
	<div  data-validate = "FoodType is required">
		<select name="cboCustomer" required>
 								<option>Choose Customer</option>
 									<?php 
 										$select=mysqli_query($connectfooddb,"SELECT * FROM customer");
 										$count=mysqli_num_rows($select);

 										for ($i=0; $i<$count; $i++) 
 										{ 
 											$data=mysqli_fetch_array($select);
 											$CName=$data['Name'];
 											$CID=$data['CustomerID'];

 											echo "<option value='$CID'>$CName</option>";
 										}
 								 	?>
 		</select>
		<span class="focus-input100"></span>
	</div>

<div class="container1-login100-form-btn m-t-17">
		
			<input type="submit" value="Order" name="btnOrder" class="login100-form-btn">
		
	</div>
	</div>
</section>
</form>
<?php
include ('footerforOrder.php');
?>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts for login/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts for login/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor for login/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor for login/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css for login/util.css">
  <link rel="stylesheet" type="text/css" href="css for login/main.css">
<!--===============================================================================================-->
