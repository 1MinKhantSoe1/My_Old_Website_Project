
    </div>
  </div>
</div>
<section class="saction3">
  <div class="container">
    <?php 

  include('ConnectForFooddb.php');

  // include('HeaderForAllDisplay.php');

  if (isset($_POST['btnSearch'])) 
  {
    $input=$_POST['txtSearch'];

    $select=mysqli_query($connectfooddb,"SELECT * FROM customer WHERE CustomerID='$input' OR (TownshipID LIKE '%$input%') OR (Name LIKE '%$input%') OR (PhoneNumber LIKE '%$input%') OR (Address LIKE '%$input%')");
    $count=mysqli_num_rows($select);

    if ($count==0)
    {
      echo "<script>alert('Not Found!')</script>";
      echo "<script>location='RecordCustomer.php'</script>";
    }
  }
  else
  {
    $select=mysqli_query($connectfooddb,"SELECT * FROM customer");
  }

 ?>

 <script>
  $(document).ready( function () {
    $('#tableid').DataTable();
  } );
</script>

  <section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container container-table">
    <div class="table-wrapper">
      <div class="container scroll">
      <table id="tableid" class="display">
        <thead>

        <tr class="table-heads">
          <th class="head-item mbr-fonts-style display-7">CustomerID</th>
          <th class="head-item mbr-fonts-style display-7">TownshipID</th>
          <th class="head-item mbr-fonts-style display-7">Name</th>
          <th class="head-item mbr-fonts-style display-7">PhoneNumber</th>
          <th class="head-item mbr-fonts-style display-7">Address</th> 
          <th class="head-item mbr-fonts-style display-7">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php 
              $select="select * 
                      from customer c, township t
                      where t.TownshipID=c.TownshipID
                      ";
            $ret=mysqli_query($connectfooddb,$select);
            $count=mysqli_num_rows($ret);
              
              for ($i=0; $i <$count ; $i++) 
                { 
                  $row=mysqli_fetch_array($ret);
                  //Fetch loke tl so tr array tway ko pyan swel htoke tr//
                  $id=$row['CustomerID'];
                  $tn=$row['TownshipName'];
                  $n=$row['Name'];
                  $p=$row['PhoneNumber'];
                  $a=$row['Address'];
                  echo "<tr>";
                  echo "<td>$id</td>";
                  echo "<td>$tn</td>";
                  echo "<td>$n</td>";
                  echo "<td>$p</td>";
                  echo "<td>$a</td>";
                  echo "  <td>
                      <a class='btnDelete'href='CustomerDelete.php?ID=$id'>Delete</a>
                      
                      <a class='btnUpdate' href='CustomerUpdate.php?ID=$id'>Update</a>
                      </td>";
                  echo "</tr>";
                } 
           ?>
           </tbody>
        </table>
        </div>
      </div>
    </div>
  
</section>
</section>

<!-- <footer class="saction8">
  <div class="container" id="contact">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="site">
          <h3>Site Link</h3>
        </div>
        <div class="sitelink">
          <ul>
            <li> <span>&#10152;</span><a href="#">About Us</a></li>
            <li><span>&#10152;</span><a href="#">Contact Us</a></li>
            <li><span>&#10152;</span><a href="#">Privacy Policy</a></li>
            <li><span>&#10152;</span><a href="#">Terms of Use</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="site">
          <h3>Site Link</h3>
        </div>
        <div class="sitelink">
          <ul>
            <li> <span>&#10152;</span><a href="#">About Us</a></li>
            <li><span>&#10152;</span><a href="#">Contact Us</a></li>
            <li><span>&#10152;</span><a href="#">Privacy Policy</a></li>
            <li><span>&#10152;</span><a href="#">Terms of Use</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="follow">
          <h3>Follow Us On...</h3>
        </div>
        <div class="social">
          <ul>
            <li> <i class="fa fa-facebook-square"></i><a href="#">Facebook</a></li>
            <li><i class="fa fa-twitter-square"></i><a href="#">Twitter</a></li>
            <li><i class="fa fa-linkedin-square"></i><a href="#">Linkedin</a></li>
            <li><i class="fa fa-google-plus-square"></i><a href="#">Google Plus</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="submit">
          <h3>Subscribe Newsletter</h3>
          <p>To get latest updates and food deals
            every week</p>
        </div>
        <div class="submitbox">
          <input type="text" />
          <div class="sub"> <a href="#">Submit</a> </div>
        </div>
      </div>
    </div>
  </div>
</footer> -->
<footer class="saction9">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="email">&copy; All right reserved 2019  /  HakHak Food Delivery </div>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript" src="js/sidemenu.js"></script>
</body>
</html>
