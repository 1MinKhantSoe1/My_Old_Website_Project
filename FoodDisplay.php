<?php 

session_start();

include('ConnectForFooddb.php');

include('HeaderForRestaurantDisplay.php');


?>
<section class="saction3">
  <div class="container" id="offer">
    <figure class="food os-animation" data-os-animation="fadeInDown
" data-os-animation-delay="0.5s">

<span class="login100-form-title p-b-53">
    <h4>Choose Food Or Drink</h4>
  </span>
<?php
$RestaurantID=$_GET['rid'];
// echo "<table width='100%'>";

$select=mysqli_query($connectfooddb,"Select * 
From restaurant1 r, foodtype1 ft,food f 
where r.RestaurantID=f.RestaurantID and ft.FoodTypeID=f.FoodTypeID 
and r.RestaurantID=$RestaurantID");
$count=mysqli_num_rows($select);

for ($i=0; $i <$count; $i+=4) 
{ 
    $subselect=mysqli_query($connectfooddb,"Select * 
From restaurant1 r, foodtype1 ft,food f 
where r.RestaurantID=f.RestaurantID and ft.FoodTypeID=f.FoodTypeID 
and r.RestaurantID=$RestaurantID Limit $i,4");
    $count1=mysqli_num_rows($subselect);
// echo "<tr>";
    for ($j=0; $j < $count1; $j++) 
    { 
        $row=mysqli_fetch_array($subselect);
        $FoodID=$row['FoodID'];
        $Image=$row['FoodImage'];
        $Name=$row['FoodName'];
// echo "<td>";
?>


<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
  
<?php
        echo "<img src='$Image' width='170px' height='145px'>
              <br>
              "
?>
<div class="order"> 
<?php
        echo"
              $Name
              <br>
              " ;
        echo "<a href='OrderFood.php?fid=$FoodID'>$Name</a>";
// echo "</td>";
?>
</div>
<?php 

  echo "<br>";

 ?>
 
</div>
<?php
    }
    // echo "</tr>";
}

?>
</figure>
</div>
</section>

<?php
// echo "</table>";
include ('FooterForCustomerMainForm.php');

 ?>