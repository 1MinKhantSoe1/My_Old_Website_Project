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
      $CID=$row['CustomerID'];
      $address=$row['Address'];
    }

  }

  if (isset($_POST['btnOrder'])) 
    {
      $CheckCash=$_POST['CheckCash'];
      $rdoSearchType=$_POST['rdoSearchType'];
      $CheckCredit=$_POST['CheckCredit'];
    
      if ($CheckCash == Cash && $rdoSearchType == 1) 
        {
    
          $OID=$_POST['txtOrderID'];
          $cid=$_SESSION['CustomerID'];
          $d=$_POST['txtdate'];
          $na=$_POST['txtMyAddress'];
          $Amount=$_POST['txtAmount'];
          $TotalQty=$_POST['txtTotalQty'];  

          $select="select * from order1 where OrderID=$OID";
          $ret1=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($ret1);
          if ($count==0) 
          {
            $insert="insert into order1 (OrderID,CustomerID,OrderDate,AddressStatus,TotalAmount,TotalQty,OrderStatus) values ('$OID','$cid','$d','$na','$Amount','$TotalQty','Pending')";
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

          //////////////////////////////////////////////////////

          $insertpayment="insert into payment (OrderID,PaymentMethod) values ('$OID','$CheckCash')";
          $ret2=mysqli_query($connectfooddb,$insertpayment);
          
          ////////////////////////////////////////////////////

          $select="select * from temporder";
          $tempret=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($tempret);

        for ($i=0; $i < $count ; $i++) 
        { 
          $row=mysqli_fetch_array($tempret);
          $Oid=$row['OrderID'];
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
          echo "<script> alert('Order Success'); window.location.assign('MainForm.php');</script>";
        }

        else
        {
          echo mysqli_error($connectfooddb);
        } 

        }

        elseif ($CheckCredit == Credit && $rdoSearchType == 1) 
        {
          $OID=$_POST['txtOrderID'];
          $cid=$_SESSION['CustomerID'];
          $d=$_POST['txtdate'];
          $na=$_POST['txtMyAddress'];
          $Amount=$_POST['txtAmount'];
          $TotalQty=$_POST['txtTotalQty'];  

          $select="select * from order1 where OrderID=$OID";
          $ret1=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($ret1);
          if ($count==0) 
          {
            $insert="insert into order1 (OrderID,CustomerID,OrderDate,AddressStatus,TotalAmount,TotalQty,OrderStatus) values ('$OID','$cid','$d','$na','$Amount','$TotalQty','Pending')";
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

          //////////////////////////////////////////////////////

          $CardNumber=$_POST['txtCardNumber'];

          $insertpayment="insert into payment (OrderID,PaymentMethod,CreditCardNumber) values ('$OID','$CheckCredit','$CardNumber')";
          $ret2=mysqli_query($connectfooddb,$insertpayment);
          
          ////////////////////////////////////////////////////

          $select="select * from temporder";
          $tempret=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($tempret);

        for ($i=0; $i < $count ; $i++) 
        { 
          $row=mysqli_fetch_array($tempret);
          $Oid=$row['OrderID'];
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
          echo "<script> alert('Order Success'); window.location.assign('MainForm.php');</script>";
        }

        else
        {
          echo mysqli_error($connectfooddb);
        }

      }

      elseif ($CheckCredit == Credit && $rdoSearchType == 2) 
        {
          $OID=$_POST['txtOrderID'];
          $cid=$_SESSION['CustomerID'];
          $d=$_POST['txtdate'];
          $na=$_POST['txtNewAddress'];
          $np=$_POST['txtNewPhone'];
          $Amount=$_POST['txtAmount'];
          $TotalQty=$_POST['txtTotalQty'];  

          $select="select * from order1 where OrderID=$OID";
          $ret1=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($ret1);
          if ($count==0) 
          {
            $insert="insert into order1 (OrderID,CustomerID,OrderDate,NewAddress,NewPhoneNumber,TotalAmount,TotalQty,OrderStatus) values ('$OID','$cid','$d','$na','$np','$Amount','$TotalQty','Pending')";
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

          //////////////////////////////////////////////////////

          $CardNumber=$_POST['txtCardNumber'];

          $insertpayment="insert into payment (OrderID,PaymentMethod,CreditCardNumber) values ('$OID','$CheckCredit','$CardNumber')";
          $ret2=mysqli_query($connectfooddb,$insertpayment);
          
          ////////////////////////////////////////////////////

          $select="select * from temporder";
          $tempret=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($tempret);

        for ($i=0; $i < $count ; $i++) 
        { 
          $row=mysqli_fetch_array($tempret);
          $Oid=$row['OrderID'];
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
          echo "<script> alert('Order Success'); window.location.assign('MainForm.php');</script>";
        }

        else
        {
          echo mysqli_error($connectfooddb);
        }

      }

      else
        {
    
          $OID=$_POST['txtOrderID'];
          $cid=$_SESSION['CustomerID'];
          $d=$_POST['txtdate'];
          $na=$_POST['txtNewAddress'];
          $np=$_POST['txtNewPhone'];
          $Amount=$_POST['txtAmount'];
          $TotalQty=$_POST['txtTotalQty'];  

          $select="select * from order1 where OrderID=$OID";
          $ret1=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($ret1);
          if ($count==0) 
          {
            $insert="insert into order1 (OrderID,CustomerID,OrderDate,NewAddress,NewPhoneNumber,TotalAmount,TotalQty,OrderStatus) values ('$OID','$cid','$d','$na','$np','$Amount','$TotalQty','Pending')";
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

          //////////////////////////////////////////////////////

          $insertpayment="insert into payment (OrderID,PaymentMethod) values ('$OID','$CheckCash')";
          $ret2=mysqli_query($connectfooddb,$insertpayment);
          
          ////////////////////////////////////////////////////

          $select="select * from temporder";
          $tempret=mysqli_query($connectfooddb,$select);
          $count=mysqli_num_rows($tempret);

        for ($i=0; $i < $count ; $i++) 
        { 
          $row=mysqli_fetch_array($tempret);
          $Oid=$row['OrderID'];
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
          echo "<script> alert('Order Success'); window.location.assign('MainForm.php');</script>";
        }

        else
        {
          echo mysqli_error($connectfooddb);
        } 

        }

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

            if ($count<1) 
            {
              echo "<script> alert('There is nothing in this order ! Please order some food'); window.location.assign('MainForm.php'); </script>";
            }

            else
            {
              
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
          </h5><a class='btnUpdate1' href="RestaurantDisplay.php?TN=<?php echo $_SESSION['tn'] ?>">For More</a>
        </span>
        </div>
      </div>
    </div>
  
</section>
</div>
</section>

<section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container" id="offer">
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w">

  <span class="login100-form-title p-b-53">
    <h4><i class="fas fa-shopping-cart"></i> Check Out</h4>
  </span>



<input type="hidden" name="txtOrderID" value="<?php echo AutoID("order1","OrderID","Order_",3)?>" readonly>

<input type="hidden" name="txtAmount" value="<?php echo "$PaymentAmount" ?>" readonly>

<input type="hidden" name="txtTotalQty" value="<?php echo "$qu" ?>" readonly> 

<div class="p-t-31 p-b-9">
    <span class="txt4">
      Order Date
    </span>
  </div>
  <div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtdate" value="<?php echo date('Y-m-d') ?>">
    <span class="focus-input100"></span>
  </div>

  <div class="w-full text-center p-t-55">
    
</div>

<div class="p-t-31 p-b-9">
    <span class="txt4">
     <input type="radio" name="rdoSearchType" value="1" id="Address1"  onclick="Address()" checked>  My Address
    </span>
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtMyAddress" value="<?php echo $address ?>" readonly>
    <span class="focus-input100"></span>
</div>

<div class="w-full text-center p-t-55">
    
</div>

<div class="p-t-31 p-b-9">
    <span class="txt4">
     <input type="radio" name="rdoSearchType" value="2" id="NewAddress"  onclick="FunctionForNewAddress()">  New Address
    </span>
  </div>

<div class="login102-form" id="divaddress" style="display: none">
  
<div class="p-t-31 p-b-9 p-r">
    
      New Address
    
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtNewAddress">
    <span class="focus-input100"></span>
</div>

<div class="p-t-31 p-b-9 p-r">
    
      New Phone
    
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtNewPhone" onkeypress="isInputNumber(event)">
    <span class="focus-input100"></span>
</div>

</div>

<div class="w-full text-center p-t-55">
    
</div>

<span class="login103-form p-b-35">
    <h5><i class="far fa-money-bill-alt"></i> Select Payment Method</h5>
  </span>

<div class="login101-form validate-form flex-sb flex-w">

    <h4>Cash:</h4> <input type="checkbox" name="CheckCash" value="Cash" id="MyCheck"  onclick="myF()" checked>
    
</div>
<div class="w-full text-center p-t-55">
    
</div>
<div class="login101-form validate-form flex-sb flex-w">

    <h4>Credit:</h4> <input type="checkbox" name="CheckCredit" value="Credit" id="myCheck"  onclick="myFunction()">
    
</div>


<div class="login102-form" id="div" style="display: none">
  
<div class="p-t-31 p-b-9 p-r">
    
      Card Number
    
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtCardNumber" placeholder="Enter Your Card Number" onkeypress="isInputNumber(event)" >
    <span class="focus-input100"></span>
</div>

</div>

<div class="w-full text-center p-t-55">
    
</div>

<div class="container3-login100-form-btn m-t-17">
    
  <input type="submit" value="Order" name="btnOrder" class="login100-form-btn">

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

 <script>
$(document).ready(function(){
    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
});
</script>

<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("div");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

<script>
function FunctionForNewAddress() {
  var checkBox = document.getElementById("NewAddress");
  var text = document.getElementById("divaddress");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

<script>
function myF() {
  var checkBox = document.getElementById("MyCheck");
  var text = document.getElementById("div");
  if (checkBox.checked == true){
    text.style.display = "none";
  } 
}
</script>

<script>
function Address() {
  var checkBox = document.getElementById("Address1");
  var text = document.getElementById("divaddress");
  if (checkBox.checked == true){
    text.style.display = "none";
  } 
}
</script>

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
