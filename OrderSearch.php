<?php 

session_start();

include('ConnectForFooddb.php');

include('HeaderForOrderSearch_SearchDetail_Purchase.php');

if (!isset($_SESSION['AdminID'])) 
  { 
  echo "<script> alert('Please Login First'); window.location.assign('Login.php'); </script>";
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
              <li><a href="RecordForm.php">Back</a></li>
              <li><a href="LogoutForAdmin.php">Logout</a></li>
            </ul>
          </nav>
        </div>
        <div class="login">
          <ul>
            <!-- <li><a href="#">Login</a></li> -->
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
    <form action="OrderSearch.php" method="post">
<figure class="food os-animation" data-os-animation="fadeInDown
" data-os-animation-delay="0.5s">
  <br>
  
    <table>
          <tr>
            
            <td class="p-r">
              <input type="radio" name="rdoSearchType" checked> Search By Restaurant
                <br/>
                <select name="cboRestaurant" required>
                <option>Choose Restaurant</option>
                  <?php 

                    $select=mysqli_query($connectfooddb,"Select * from restaurant1");

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
              <br>
              <br>
            </td>
            <td>
              <input class='btnUpdate' type="submit" name="btnSearch" value="Search"/>
            </td>
      </tr>
      </table>
  
</figure>

<?php

if (isset($_POST['btnSearch'])) 
{

 $R=$_POST['cboRestaurant'];
$select=mysqli_query($connectfooddb,"Select * from restaurant1 where RestaurantID='$R'");
$count=mysqli_num_rows($select);

for ($i=0; $i <$count; $i+=4) 
{ 
    $subselect=mysqli_query($connectfooddb,"Select * from restaurant1 where RestaurantID='$R' Limit $i,4");
    $count1=mysqli_num_rows($subselect);
// echo "<tr>";

    for ($j=0; $j < $count1; $j++) 
    { 
        $row=mysqli_fetch_array($subselect);
        $RestaurantID=$row['RestaurantID'];
        $Image=$row['LogoImages'];
        $Name=$row['Name'];

        
// echo "<td>";

        
?>


<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
  <figure class="food os-animation" data-os-animation="fadeInDown
" data-os-animation-delay="0.5s">
<?php
        echo "<img src='$Image' width='170px' height='170px'>
              <br>
              "
?>
<div class="order"> 
<?php
        echo"
              $Name
              <br>
              " ;
        echo "<a href='SearchDetail.php?rid=$RestaurantID'>Shop</a>";
// echo "</td>";
?>
</div>
<?php 
  
  echo "<br>";

 ?>
</figure>
</div>
<?php
    }
   
}

 // ------------------
}//if end
else
{

$select=mysqli_query($connectfooddb,"Select * from restaurant1");
$count=mysqli_num_rows($select);

for ($i=0; $i <$count; $i+=4) 
{ 
    $subselect=mysqli_query($connectfooddb,"Select * from restaurant1 Limit $i,4");
    $count1=mysqli_num_rows($subselect);
// echo "<tr>";

    for ($j=0; $j < $count1; $j++) 
    { 
        $row=mysqli_fetch_array($subselect);
        $RestaurantID=$row['RestaurantID'];
        $Image=$row['LogoImages'];
        $Name=$row['Name'];
// echo "<td>";

        
?>


<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
  <figure class="food os-animation" data-os-animation="fadeInDown
" data-os-animation-delay="0.5s">
<?php
        echo "<img src='$Image' width='170px' height='170px'>
              <br>
              "
?>
<div class="order"> 
<?php
        echo"
              $Name
              <br>
              " ;
        echo "<a href='SearchDetail.php?rid=$RestaurantID'>Shop</a>";
// echo "</td>";
?>
</div>
<?php 
  
  echo "<br>";

 ?>
</figure>
</div>
<?php
    }
   
}
}

?>


</form>
</div>
</section>
<br>
<br>
<br>
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

include ('FooterForOrderSearch_SearchDetail_Purchase.php');

 ?>