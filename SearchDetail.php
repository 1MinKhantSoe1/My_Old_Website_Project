<?php 
session_start();
include ('HeaderForOrderSearch_SearchDetail_Purchase.php');
include('ConnectForFooddb.php');
include('AutoID.php');

    if (!isset($_SESSION['AdminID'])) 
  { 
  echo "<script> alert('Please Login First'); window.location.assign('Login.php'); </script>";
  }
  


if (isset($_POST['btnSearch'])) 
    {
      $rdoSearchType=$_POST['rdoSearchType'];
      $RestaurantID=$_GET['rid'];
         
        
           $txtFrom=date('Y-m-d',strtotime($_POST['txtOrderDate']));
 $RestaurantID=$_GET['rid'];

           $select1="Select * 
      From food f, order1 o, order_food of, restaurant1 r, customer c
      Where f.FoodID=of.FoodID 
      And o.OrderID=of.OrderID
      And r.RestaurantID=f.RestaurantID
      And o.CustomerID=c.CustomerID
      And r.RestaurantID=$RestaurantID
      and o.OrderDate='$txtFrom'
      and o.OrderStatus='Pending'";

         $ret=mysqli_query($connectfooddb,$select1);
         $count=mysqli_num_rows($ret);
    }
    else
    {
     
      $RestaurantID=$_GET['rid'];

           $select1="Select * 
      From food f, order1 o, order_food of, restaurant1 r, customer c
      Where f.FoodID=of.FoodID 
      And o.OrderID=of.OrderID
      And r.RestaurantID=f.RestaurantID
      And o.CustomerID=c.CustomerID
      And r.RestaurantID=$RestaurantID
      and o.OrderStatus='Pending'";

         $ret=mysqli_query($connectfooddb,$select1);
         $count=mysqli_num_rows($ret);
    }
    $RestaurantID=$_GET['rid'];

    $_SESSION['RestaurantID']=$RestaurantID;


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
              <li><a href="OrderSearch.php">Back</a></li>
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
        <form action="SearchDetail.php?rid=<?php echo $RestaurantID ?>" method="post">
          <br>

          <table>

              <tr>
            <td class="p-r">
              <input type="radio" name="rdoSearchType" checked>Search By Date
              <br/>
              <b>Order Date :</b>
              <div class="wrap-input105 validate-input" data-validate = "Admin Name is required">
              <input type="text" name="txtOrderDate" value="<?php echo date('Y-m-d') ?>" 
              OnClick="showCalender(calender,this)" readonly class="input102"/>
              </div>
            </td>
            <td>
              <input class='btnUpdate' type="submit" name="btnSearch" value="Search"/>
            </td>
          </tr>

          </table>
        </div>
  </section>

<section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container container-table">
    <div class="table-wrapper">
      <div class="container scroll">
      <table class="table isSearch" cellspacing="0">
        <thead>
        <tr class="table-heads">
          <th class="head-item mbr-fonts-style display-7">Order Date</th>
          <th class="head-item mbr-fonts-style display-7">Image</th>
          <th class="head-item mbr-fonts-style display-7">FoodName</th>
          <th class="head-item mbr-fonts-style display-7">Price</th>
          <th class="head-item mbr-fonts-style display-7">Qty</th>
          <th class="head-item mbr-fonts-style display-7">CustomerName</th>
        </tr>
        </thead>
          <?php 

          if ($count<1) 
          {
            echo "<div align='Center'><b>No Order List Found</b></div> <br>";
          }

          else
          {
			
		     $qu=0;
		            $PaymentAmount=0;
              
              for ($i=0; $i <$count ; $i++) 
                { 
                  $row=mysqli_fetch_array($ret);
                  //Fetch loke tl so tr array tway ko pyan swel htoke tr//
                  
                  $fi=$row['FoodImage'];
                  $fname=$row['FoodName'];
                  $p=$row['Price'];
                  $q=$row['Quantity1'];
                  $cn=$row['UserName'];
                  $od=$row['OrderDate'];

                  $TotalAmount=$q*$p;

                  $PaymentAmount+=$TotalAmount;
                  $qu+=$q;

                  echo "<tr>";
                  echo "<td>$od </td>";
                  echo "<td><img src='$fi' width='100px' height='100px'></td>";
                  echo "<td>$fname</td>";
                  echo "<td>$p Ks</td>";
                  echo "<td>$q Qty</td>";
                  echo "<td>$cn </td>";
                  echo "</tr>";
                } 

            }
           ?>
           <tr>
             <td colspan="6" align="right">
              <a class='btnUpdate' href='Purchase.php?pid=<?php echo $RestaurantID ?>'>Purchase</a>
             </td>

           </tr>
        </table>
      </form>
        </div>
      </div>
    </div>
  
</section>
<br>
<br>

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