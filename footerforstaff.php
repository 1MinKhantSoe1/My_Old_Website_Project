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

    $select=mysqli_query($connectfooddb,"SELECT * FROM staff WHERE StaffID='$input' OR (StaffName LIKE '%$input%')");
    $count=mysqli_num_rows($select);

    if ($count==0)
    {
      echo "<script>alert('Not Found!')</script>";
      echo "<script>location='RecordStaff.php'</script>";
    }
  }
  else
  {
    $select=mysqli_query($connectfooddb,"SELECT * FROM staff");
  }

 ?>

<script>
  $(document).ready( function () {
    $('#tableid').DataTable();
  } );
</script>

<script type="text/javascript">
    function isInputNumber(evt)
    {
      var ch= String.fromCharCode(evt.which);

      if(!(/[0-9]/.test(ch)))
      {
        evt.preventDefault();
      }
    }
  </script>

  <section class="section-table cid-riZXhxTY2u" id="table1-3">
  <div class="container container-table">
    <div class="table-wrapper">
      <div class="container scroll">
      <table id="tableid" class="display">
        <thead>

        <tr class="table-heads">
          <th class="head-item mbr-fonts-style display-7">StaffID</th>
          <th class="head-item mbr-fonts-style display-7">Name</th>
          <th class="head-item mbr-fonts-style display-7">Age</th>
          <th class="head-item mbr-fonts-style display-7">Gender</th>
          <th class="head-item mbr-fonts-style display-7">Address</th>
          <th class="head-item mbr-fonts-style display-7">PhoneNumber</th>
          <th class="head-item mbr-fonts-style display-7">NRC</th>
          <th class="head-item mbr-fonts-style display-7">Email</th>
          <th class="head-item mbr-fonts-style display-7">Position</th>
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
                  $id=$row['StaffID'];
                  $Name=$row['StaffName'];
                  $age=$row['Age'];
                  $gender=$row['Gender'];
                  $address=$row['Address'];
                  $phonenumber=$row['PhoneNumber'];
                  $nrc=$row['NRC'];
                  $email=$row['Email'];
                  $position=$row['Position'];
                  echo "<tr>";
                  echo "<td>$id</td>";
                  echo "<td>$Name</td>";
                  echo "<td>$age</td>";
                  echo "<td>$gender</td>";
                  echo "<td>$address</td>";
                  echo "<td>$phonenumber</td>";
                  echo "<td>$nrc</td>";
                  echo "<td>$email</td>";
                  echo "<td>$position</td>";
                  echo "  <td>
                      <a class='btnDelete'href='StaffDelete.php?ID=$id'>Delete</a>
                      
                      <a class='btnUpdate' href='StaffUpdate.php?ID=$id'>Update</a>
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
