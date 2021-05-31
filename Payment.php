<?php 

  session_start();

  include('ConnectForFooddb.php');

  include('HeaderForRestaurantDisplay.php');

  include('AutoID.php');

  if (!isset($_SESSION['CustomerID'])) 
{
  echo "<script> alert('There is nothing in this order ! Please Login first and order some food'); window.location.assign('CustomerLogin.php'); </script>";
}

  if (isset($_SESSION['CustomerID'])) 
  {
    $CustomerID=$_SESSION['CustomerID'];
     $select="select * from Customer where customerID='$CustomerID'";
    $ret1=mysqli_query($connectfooddb,$select);
    $count1=mysqli_num_rows($ret1);

    for ($i=0; $i < $count1; $i++) 
    { 
      $row=mysqli_fetch_array($ret1);
      $address=$row['Address'];
    }

  }

  if (isset($_POST['btnContinue'])) 
    {
      $rdoSearchType=$_POST['rdoSearchType'];

        if ($rdoSearchType == 1) 
        {
         echo "<script>window.location.assign('OrderConfirm.php')</script>"; 
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
        // else
        // {
        //  $cboStatus=$_POST['cboStatus'];

        //  $query="SELECT po.*, s.SupplierID, s.SupplierName
        //      FROM purchaseorder po, Supplier s
        //      WHERE po.Status='$cboStatus'
        //      AND po.SupplierID=s.SupplierID
        //      ";
        //  $result=mysql_query($query);
        //  $count=mysql_num_rows($result);
        // }
    }

 ?>

<section class="saction3">
 <div class="container">
<section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container container-table">
    <div class="table-wrapper">
      <div class="container scroll">
        <span class="login100-form-title p-b-53">
    <h4>Currently your order</h4>
  </span>
      <table class="table isSearch" cellspacing="0">
        <thead>

        <tr class="table-heads">
          <th class="head-item mbr-fonts-style display-7">Food Name</th>
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
                  $fname=$row['FoodName'];
                  $q=$row['Qty'];
                  $p=$row['Price'];
                  
                  $TotalAmount=$q*$p;

                  $PaymentAmount+=$TotalAmount;
                  $qu+=$q;

                  echo "<tr>";
                  echo "<td>$fname</td>";
                  echo "<td>$q</td>";
                  echo "<td>$p Ks</td>";
                  echo "  <td>
                      <a class='btnDelete'href='OrderDelete.php?ID=$fid'>Remove</a>
                      </td>";
                  echo "</tr>";
                } 
           ?>
           <tr>
             <td colspan="4" align="right">
              Total Amount : 
               <?php echo $PaymentAmount ?> Ks

            <br>
               Total Qty :
               <?php echo $qu?> Qty
             </td>

           </tr>
        </table>
        <span class="login100-form-title p-b-53">
          <br>
          <h5>You can order for more food or drink by clicking this button
                                      <br>
                                      <br>
                                       ||
                                       <br>
                                       ||
                                       <br>
                                       ||
                                       <br>
                                       \/ 
          </h5><a class='btnUpdate1' href="RestaurantDisplay.php">For More</a>
        </span>
        </div>
      </div>
    </div>
  
</section>

<!-- <div class="container1-login100-form-btn m-t-17">
		
	<input type="submit" value="Continue" name="btnOrder" class="login100-form-btn">

</div> -->
	</div>
</section>

<section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container" id="offer">
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w">

  <span class="login100-form-title p-b-53">
    <h4>Verify your information</h4>
  </span>

<div class="p-t-31 p-b-9">
    <span class="txt4">
     <input type="radio" name="rdoSearchType" value="1" checked>  My Address
    </span>
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtmyaddress" value="<?php echo $address?>" readonly>
    <span class="focus-input100"></span>
</div>

<div class="w-full text-center p-t-55">
    
  </div>
<div class="p-t-31 p-b-9">
    <span class="txt4">
     <input type="radio" name="rdoSearchType" value="2">  New Address
    </span>
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtNewAddress">
    <span class="focus-input100"></span>
</div>

<div class="w-full text-center p-t-55">
    
</div>

<div class="container3-login100-form-btn m-t-17">
    
  <input type="submit" value="Continue" name="btnContinue" class="login100-form-btn">

</div>

</form>

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
include ('FooterForCustomerMainForm.php');
?>