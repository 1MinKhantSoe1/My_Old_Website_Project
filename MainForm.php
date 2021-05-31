<?php 
  
  session_start();
  
  include("HeaderForCustomerMainForm.php");

  include('ConnectForFooddb.php'); 

  if (isset($_POST['btntownship'])) 
  {
     $tn=$_POST['txttownship'];
     $_SESSION['tn']=$tn;

    $select="select * from township where TownshipName='$tn'";

    $ret1=mysqli_query($connectfooddb,$select);
    $count1=mysqli_num_rows($ret1);

    for ($i=0; $i < $count1; $i++) 
    { 
      $row=mysqli_fetch_array($ret1);
      $CID=$row['TownshipName'];
    }

     if ($tn == '') 
     {
        echo"<script>alert('Please Enter Your Township First!')</script>";
      echo "<script>location='MainForm.php'</script>";
     }

     elseif ( $tn != $CID) 
     {
       echo "<script>location='ServiceArea.php'</script>";
     }

     else
     {
        echo "<script> window.location.assign('RestaurantDisplay.php?TN=$tn'); </script>";

     }

      
   } 
 ?>

<section class="backgraound">
  <form action="#" method="POST">
  <div class="container" >
    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-12">
        
        <div class="back">
          <div class="line1 os-animation" data-os-animation="rotateInDownLeft" data-os-animation-delay="1s"> </div>
          <div class="line2 os-animation" data-os-animation="rotateInDownLeft" data-os-animation-delay="1s"> </div>
          <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s"></h2>
          <h3 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s">To Order Online</h3>
          <div class="line3 os-animation" data-os-animation="rotateInDownRight" data-os-animation-delay="1s"> </div>
          <div class="line4 os-animation" data-os-animation="rotateInDownRight" data-os-animation-delay="1s"> </div>
        </div>
      </div>
    </div>
    <br>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="textbox os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">
        <!-- <h3>Location Name</h3>
        <input type="text" placeholder="Secunderabad" /> -->
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="textbox1 os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">
        <h3>Township</h3>
        <input list="txttownship" placeholder="Enter Your Township" name="txttownship" required />
        <datalist id="txttownship">
              <?php  
              $POquery="SELECT * FROM township";
              $ret1=mysqli_query($connectfooddb,$POquery);
              $POcount=mysqli_num_rows($ret1); //Count Purchase Order Record

              for($i=0; $i < $POcount; $i++) 
              { 
                $POrow=mysqli_fetch_array($ret1);
                //print_r($POrow);
                $TownshipName=$POrow['TownshipName'];
                echo "<option value='$TownshipName'>";
              }
              ?>
              </datalist>
        <br>
        <input type="submit" name="btntownship" value="Search" style="background-color: #2E8B57; font-style: italic; color: white;"></div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="textbox1 os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.5s">
        <!-- <h3>Location Name</h3>
        <input type="text" placeholder="" />
        <span class="search"><a href="#"><i class="fa fa-search"></i></a></span> </div> -->
    </div>
  </div>
  </form>
</section>
<section class="saction3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="ordaring">
          <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s">Ordering food was never so easy</h2>
          <div class="dotted os-animation" data-os-animation="bounceInLeft" data-os-animation-delay="1s"></div>
          <p class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s">Just 4 step follow</p>
          <div class="dotted1 os-animation" data-os-animation="bounceInRight" data-os-animation-delay="1s"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6">
        <figure class="step os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.50s"> <img src="images/one.png" alt="" /> </figure>
        <div class="arrow" > <img src="images/arrow.png" alt="" /> </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6">
        <figure class="step os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="1.5s"> <img src="images/two.png" alt="" /> </figure>
        <div class="arrow1 "> <img src="images/arrow.png" alt="" /> </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6">
        <figure class="step os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="2.5s"> <img src="images/thrww.png" alt="" /> </figure>
        <div class="arrow"> <img src="images/arrow.png" alt="" /> </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6">
        <figure class="step1 os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="3.5s"> <img src="images/four.png" alt="" /> </figure>
      </div>
    </div>
  </div>
</section>
<section class="section12">

  <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s">
    What Is HakHak Food Delivery?
  </h2>
  <br>
  <p class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s">
    We are the premier online food ordering and delivery service in Yangon. Our website HakHakFoodDelivery.com hosts menus from a broad range of Yangon restaurants. Customers may view menus and place orders for delivery to home or office via the website. HakHak Food Delivery relays the orders to the appropriate restaurant, picks up the completed order from the restaurant, and delivers the items to the customer. Our website also allows customers to schedule a pickup for their orders from restaurants. HakHak Food Delivery is very convenient both for businesses as well as individuals wanting to order food for delivery to their homes. Our service is available 12 hours a day / 7 days a week.
  </p>
  
</section>

<section class="section12">

  <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s">
    Who Are The Delivery Carriers?
  </h2>
  <br>
  <p class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s">
    Uniformed and badged HakHak Food Delivery carriers must pass a two week training program, meaning you can expect the highest level of service and professionalism from our team. All of our carriers must pass a pre-employment medical check and regular health checks for hygienic handling of food products. Our employees are treated fairly and respectfully. HakHak Food Delivery provides competitive market salaries, eight hour shifts and breaks.
  </p>
  
</section>

<section class="section12">

  <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s">
    How Do We Deliver?
  </h2>
  <br>
  <p class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s">
    Delivery will be predominantly through bicycles, ensuring a greener, faster and more efficient delivery service. We may also deliver by cars on an as-needed basis for larger orders or specialty items. We use heat insulated bags with thermal hot/cold packs, ensuring that food is delivered warm or chilled, as needed.
  </p>
  
</section>

<section class="section12">

  <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.50s">
    Our Values
  </h2>
  <br>
  <p class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s">
    We provide opportunities for smaller restaurants and social businesses to partner with us by giving them an opportunity to showcase their menus and increase their sales through waiving listing fees.
  </p>
  
</section>

<?php 


  include("FooterForCustomerMainForm.php")


 ?>
