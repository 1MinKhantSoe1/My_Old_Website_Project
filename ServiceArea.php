<?php 

session_start();

include('ConnectForFooddb.php');

include('HeaderForRestaurantDisplay.php');
?>

<section class="saction3">
  <div class="container">

      <h3>Service Area</h3>
      <br>
      <h5><b>Please select an available service area below to start your order</b></h5>
      <br>

  <section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container container-table">
    <div class="table-wrapper">
      <div class="container scroll">
      
        <span class="login100-form-title p-b-53">
          <h4>Yangon</h4>
        </span>
        <div class="col-md-6 col-xs-6">
          <a href="RestaurantDisplay.php?TN=San Chaung">San Chaung</a>
        </div>
        <div class="col-md-6 col-xs-6">
          <a href="RestaurantDisplay.php?TN=Sayar San">Sayar San</a>
        </div>
        <div class="col-md-6 col-xs-6">
          <a href="RestaurantDisplay.php?TN=Hledan">Hledan</a>
        </div>
        <div class="col-md-6 col-xs-6">
          <a href="RestaurantDisplay.php?TN=Latha">Latha</a>
        </div>
      </div>
    </div>
  </div>
  </section>

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