
    </div>
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

    $select=mysqli_query($connectfooddb,"SELECT * FROM foodtype1 WHERE FoodTypeID='$input' OR (Type LIKE '%$input%')");
    $count=mysqli_num_rows($select);

    if ($count==0)
    {
      echo "<script>alert('Not Found!')</script>";
      echo "<script>location='RecordFoodType.php'</script>";
    }
  }
  else
  {
    $select=mysqli_query($connectfooddb,"SELECT * FROM foodtype1");
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
          <th class="head-item mbr-fonts-style display-7">FoodTypeID</th>
          <th class="head-item mbr-fonts-style display-7">Type</th>
          <th class="head-item mbr-fonts-style display-7">Action</th>
        </tr>

        </thead>
        <tbody>
          <?php 

            
            $count=mysqli_num_rows($select);
              
              for ($i=0; $i <$count ; $i++) 
                { 
                  $row=mysqli_fetch_array($select);
                  //Fetch loke tl so tr array tway ko pyan swel htoke tr//
                  $id=$row['FoodTypeID'];
                  $fn=$row['Type'];
                  echo "<tr>";
                  echo "<td>$id</td>";
                  echo "<td>$fn</td>";
                  echo "  <td>
                      <a class='btnDelete'href='FoodTypeDelete.php?ID=$id'>Delete</a>
                      
                      <a class='btnUpdate' href='FoodTypeUpdate.php?ID=$id'>Update</a>
                      </td>";
                  echo "</tr>";
                } 
           ?>
           </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</section>

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
