<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hak Hak Food</title>
<link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300,700' rel='stylesheet' type='text/css' />

<script type="text/javascript" src="DatePicker/datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="DatePicker/datepicker.css"/>

<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script> 

<!--MOBILE DEVICE-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<!--CSS-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>

<!--JS-->

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script src="js/scripts.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="https://kit.fontawesome.com/4c64bfca04.js"></script>


<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts for login/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts for login/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor for login/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor for login/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor for login/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css for login/util.css">
  <link rel="stylesheet" type="text/css" href="css for login/main.css">
<!--===============================================================================================-->


</head>

<body>
<!-- Paste this code after body tag -->
<div class="se-pre-con"></div>
<!-- Ends -->

<header>
  <div class="container">
    <div class="row clearfix" id="home">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="logo">
          <h1> <a href="#"><img src="images/HakHakFood.png" alt="" /></a> </h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="contact">
          <p>Questions? Call us Toll-free!<span class="number"><a href="#">1800-0000-7777</a></span><span class="time">(11AM to 11PM)</span></p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="saction1">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="menu">
          <div class="mobile-nav-container"> </div>
          <div class="mobile-nav-btn"><img class="nav-open" src=                "https://s3-us-west-2.amazonaws.com/s.cdpn.io/6214/nav-open.png" alt="Nav Button Open" /> <img class="nav-close" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/6214/nav-close.png" alt="Nav Button Close" /> </div>
          <nav>
            <ul>
              <li><a href="MainForm.php">Home</a></li>
              <li><a href="OrderConfirm.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
            </ul>
          </nav>
        </div>
        <div class="login">
          <ul>

            <div style="display: none">
            
            <?php 


              $cid=$_SESSION['CustomerName'];
            
            ?>

            </div>
            <?php

              if ( $cid == '') 
              {
           
              echo "<li><a href='CustomerLogin.php'>Login</a></li>";
              echo "<li><a href='CustomerRegister.php'>Register</a></li>";
              
              }
            
              else
              {
                echo "<li><a href='CustomerAccount.php'><i class='fas fa-user'></i>  ".$_SESSION['CustomerName']."</a></li>";
              }

             ?>
             
            
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>