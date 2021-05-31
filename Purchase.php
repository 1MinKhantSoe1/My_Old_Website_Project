<?php 
session_start();
include ('HeaderForOrderSearch_SearchDetail_Purchase.php');
include('ConnectForFooddb.php');
include('AutoID.php');

if (!isset($_SESSION['AdminID'])) 
	{	
	echo "<script> alert('Please Login First'); window.location.assign('Login.php'); </script>";
	}
	

if (isset($_POST['btnpurchase'])) 
{



	$PID=$_POST['txtPurchaseID'];
	$date=$_POST['txtDate'];
	$d=$_POST['cboTime'];
	$na=$_POST['cboStaff'];
	$TAmount=$_POST['txtAmount'];

    

		$insert2="Insert into purchase (PurchaseID,StaffID,PurchaseDate,PurchaseTime,TotalAmount) values 
		  	 ('".$PID."','".$na."','".$date."','".$d."','".$TAmount."')";
		$ret1=mysqli_query($connectfooddb,$insert2);
       

		$select="select * from calculateqty";
          $tempret=mysqli_query($connectfooddb,$select);
          $count2=mysqli_num_rows($tempret);

        for ($i=0; $i < $count2 ; $i++) 
        { 
          $row=mysqli_fetch_array($tempret);
          $OderID=$row['OrderID'];
          $Fid=$row['FoodID'];
          $OrderQty=$row['sumqty'];

          $insert="insert into purchase_detail (PurchaseID,FoodID,PurchaseQty) values ('$PID','$Fid','$OrderQty')";
          $ret=mysqli_query($connectfooddb,$insert);

          	$update="Update order1 
			set OrderStatus='Purchase'
			where OrderID='$OderID'";
			$ret5=mysqli_query($connectfooddb,$update);

        }

    echo "<script> alert('Purchase');window.location.assign('OrderList.php'); </script>";
          
}



 ?>

 <section class="saction1">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="menu">
          <div class="mobile-nav-container"> </div>
          <div class="mobile-nav-btn"><img class="nav-open" src=                "https://s3-us-west-2.amazonaws.com/s.cdpn.io/6214/nav-open.png" alt="Nav Button Open" /> <img class="nav-close" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/6214/nav-close.png" alt="Nav Button Close" /> </div>
          <nav>
            <ul>
              <li><a href="SearchDetail.php?rid=<?php echo $_SESSION['RestaurantID'] ?>">Back</a></li>
              <li><a href="LogoutForAdmin.php">Logout</a></li>
            </ul>
          </nav>
        </div>
        <div class="login">
          <ul>
            <!-- <li><a href="Admin.php">Register</a></li> -->
            <!-- <li><a href="#">Help</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

 <section class="saction10">
  <div class="container" id="offer">
    <form action="Purchase.php" method="post">
<figure class="food os-animation" data-os-animation="fadeInDown
" data-os-animation-delay="0.5s">
	<table>
		
	<tr>
		<td>
	<b>
      Purchase ID
    </b>
	  <div class="wrap-input105 validate-input" data-validate = "Food Name is required">
	<input class="input102" type="text" name="txtPurchaseID" value="<?php echo AutoID("purchase","PurchaseID","Pu_",3)?>" readonly>
	<span class="focus-input100"></span>
	 </div>

	 <div class="w-full text-center p-t-55">
    
	</div>

	 <b>
      Purchase Date
    </b>
	  <div class="wrap-input105 validate-input" data-validate = "Food Name is required">
	<input class="input102" type="text" name="txtDate" value="<?php echo date('Y-m-d') ?>" 
                OnClick="showCalender(calender,this)" readonly>
	<span class="focus-input100"></span>
	 </div>
	</td>
	<td>
	 <b>
      Purchase Time
    </b>
    <br>
	  <select name="cboTime" required>
                <option>Choose Time</option>
                <option>10:00 am</option>
                <option>10:15 am</option> 
                <option>10:30 am</option> 
                <option>10:45 am</option>
                <option>10:50 am</option>
                <option>11:00 am</option>
                <option>11:15 am</option> 
                <option>11:30 am</option> 
                <option>11:45 am</option>
                <option>11:50 am</option>
                <option>12:00 pm</option>
                <option>12:15 pm</option> 
                <option>12:30 pm</option> 
                <option>12:45 pm</option>
                <option>12:50 pm</option>
                <option>01:00 pm</option>
                <option>01:15 pm</option> 
                <option>01:30 pm</option> 
                <option>01:45 pm</option>
                <option>01:50 pm</option>
                <option>02:00 pm</option>
                <option>02:15 pm</option> 
                <option>02:30 pm</option> 
                <option>02:45 pm</option>
                <option>02:50 pm</option>
                <option>03:00 pm</option>
                <option>03:15 pm</option> 
                <option>03:30 pm</option> 
                <option>03:45 pm</option>
                <option>03:50 pm</option>
                <option>04:00 pm</option>
                <option>04:15 pm</option> 
                <option>04:30 pm</option> 
                <option>04:45 pm</option>
                <option>04:50 pm</option>
                <option>05:00 pm</option>
                <option>05:15 pm</option> 
                <option>05:30 pm</option> 
                <option>05:45 pm</option>
                <option>05:50 pm</option>
                <option>06:00 pm</option>
                <option>06:15 pm</option> 
                <option>06:30 pm</option> 
                <option>06:45 pm</option>
                <option>06:50 pm</option>
                <option>07:00 pm</option>
                <option>07:15 pm</option> 
                <option>07:30 pm</option> 
                <option>07:45 pm</option>
                <option>07:50 pm</option>
                <option>08:00 pm</option>
                <option>08:15 pm</option> 
                <option>08:30 pm</option> 
                <option>08:45 pm</option>
                <option>08:50 pm</option>
                <option>09:00 pm</option>
                <option>09:15 pm</option> 
                <option>09:30 pm</option> 
                <option>09:45 pm</option>
                <option>09:50 pm</option>
                <option>10:00 pm</option>
      </select>

	<div class="w-full text-center p-t-55">
    
	</div>

      <b>
      Staff Name
    </b>
    <br>
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
      </td>
</tr>
</table>


</figure>

</div>
</section>
 <section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container container-table">
    <div class="table-wrapper">
      <div class="container scroll">
      	
      <table class="table isSearch" cellspacing="0">
        <thead>


        <tr class="table-heads">
        	<th class="head-item mbr-fonts-style display-7">No.</th>
          <th class="head-item mbr-fonts-style display-7">Image</th>
          <th class="head-item mbr-fonts-style display-7">FoodName</th>
          <th class="head-item mbr-fonts-style display-7">Price</th>
          <th class="head-item mbr-fonts-style display-7">TotalQty</th>
          <th class="head-item mbr-fonts-style display-7">Amount</th>
        </tr>
        </thead>
          <?php 

			$RestaurantID=$_GET['pid'];

			$delete=mysqli_query($connectfooddb,"Drop View calculateqty");

			$createview=mysqli_query($connectfooddb,"Create view calculateqty as (Select f.FoodID,f.FoodName,o.OrderID,r.Name,f.Price, f.FoodImage,SUM(of.Quantity1) as sumqty
From food f, order1 o, order_food of, restaurant1 r, customer c Where f.FoodID=of.FoodID And o.OrderID=of.OrderID And r.RestaurantID=f.RestaurantID And o.CustomerID=c.CustomerID And o.OrderStatus='Pending' And r.RestaurantID='$RestaurantID' group by f.FoodID )");


         	 $select1="Select * from calculateqty";

		     $ret4=mysqli_query($connectfooddb,$select1);
		     $count4=mysqli_num_rows($ret4);
		     $qu=0;
		            $PaymentAmount=0;
              
              for ($i=0; $i <$count4 ; $i++) 
                { 
                  $row=mysqli_fetch_array($ret4);
                  //Fetch loke tl so tr array tway ko pyan swel htoke tr//
                  $fi=$row['FoodImage'];
                  $fname=$row['FoodName'];
                  $p=$row['Price'];

                  $q=$row['sumqty'];

                  $TotalAmount=$q*$p;

                  $PaymentAmount+=$TotalAmount;
                  $qu+=$q;

                  $no=$i+1;

                  echo "<tr>";
                   echo "<td> $no ) </td>";
                  echo "<td><img src='$fi' width='100px' height='100px'></td>";
                  echo "<td>$fname</td>";
                  echo "<td>$p Ks</td>";
                  echo "<td>$q Qty</td>";
                   echo "<td>$TotalAmount MMK</td>";
                  
                  echo "</tr>";
                } 
           ?>

           <tr>
           		<td colspan="7" align="right">
           			<?php echo "TotalAmount : ".$PaymentAmount." MMK" ?>
           		</td>

           </tr>

           <input type="hidden" name="txtAmount" value="<?php  echo $PaymentAmount ?>">

           <tr>
             <td colspan="7" align="right">
              <input type="submit" name="btnpurchase" class="btnUpdate" value="Purchase">
             </td>

           </tr>
        </table>
    	</form>
        </div>
      </div>
    </div>
  
</section>

<link rel="stylesheet" href="assets/tether/tether.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/theme/css/style.css">
<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
 <?php 

 include('FooterForOrderSearch_SearchDetail_Purchase.php');

  ?>