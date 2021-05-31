<?php 

session_start();

include('ConnectForFooddb.php');

include('HeaderForAllFoodDisplay.php');
?>

<section class="section-table cid-riZXhxTY2u" id="table1-3">
<form action="#" method="post" class="login100-form validate-form flex-sb flex-w">

<div class="p-t-31 p-b-9">
    <span class="txt4">
      Name
    </span>
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtName">
    <span class="focus-input100"></span>
</div>
<div class="w-full text-center p-t-55">
    
  </div>
<div class="p-t-31 p-b-9">
    <span class="txt4">
      Phone Number
    </span>
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtPhoneNumber">
    <span class="focus-input100"></span>
</div>
<div class="w-full text-center p-t-55">
    
  </div>
<div class="p-t-31 p-b-9">
    <span class="txt4">
      Address 1
    </span>
</div>  

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtAddress1">
    <span class="focus-input100"></span>
</div>
<div class="w-full text-center p-t-55">
    
  </div>
<div class="p-t-31 p-b-9">
    <span class="txt4">
      Address 2 (Optional)
    </span>
  </div>

<div class="wrap-input104 validate-input" data-validate = "Food Name is required">
    <input class="input100" type="text" name="txtAddress2">
    <span class="focus-input100"></span>
</div>

<div class="w-full text-center p-t-55">
    
</div>

<div class="container3-login100-form-btn m-t-17">
    
  <input type="submit" value="Continue" name="btnOrder" class="login100-form-btn">

</div>

</form>
</section>
<?php

  include ('FooterForAllFoodDisplay.php');

 ?>