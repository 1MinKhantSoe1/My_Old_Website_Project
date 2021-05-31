<?php 

session_start();

include('ConnectForFooddb.php');

include('HeaderForRestaurantDisplay.php');
?>



<section class="saction3">
  <div class="container" id="offer">
    <figure class="food os-animation" data-os-animation="fadeInDown
" data-os-animation-delay="0.5s">


<?php
// echo "<table width='100%'>";
  $TownshipName=$_GET['TN'];

$select=mysqli_query($connectfooddb,"SELECT * FROM restaurant1 r,township t where r.TownshipID=t.TownshipID and t.TownshipName='$TownshipName'");
$count=mysqli_num_rows($select);

?>

<span class="login100-form-title p-b-53">
    <h4>Choose Restaurant</h4>
  </span>

<?php

for ($i=0; $i <$count; $i+=4) 
{ 
    $subselect=mysqli_query($connectfooddb,"SELECT * FROM restaurant1 r,township t where r.TownshipID=t.TownshipID and t.TownshipName='$TownshipName' Limit $i,4");
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
        echo "<a href='FoodDisplay.php?rid=$RestaurantID'>$Name</a>";
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


<?php
// echo "</table>";

?>
</figure>
</div>
</section>

<?php

include ('FooterForCustomerMainForm.php');

 ?>