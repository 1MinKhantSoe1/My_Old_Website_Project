<?php 

	session_start();

	include('ConnectForFooddb.php');

	include('HeaderForAdminUpdate.php');

	if (isset($_GET['ID'])) 
	{
		$id=$_GET['ID'];
		$select="SELECT * FROM admintable1 WHERE AdminID='$id'";
		$ret=mysqli_query($connectfooddb,$select);
		$row=mysqli_fetch_array($ret);

		$adminid=$row['AdminID'];
		$adminname=$row['AdminName'];
		$email=$row['Email'];
		$password=$row['Password'];
		$role=$row['Role'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$id=$_POST['txtID'];
		$adminname=$_POST['txtadminname'];
		$email=$_POST['txtemail'];
		$password=$_POST['txtpass'];
		$role=$_POST['txtrole'];


		$select="SELECT * FROM admintable1 Where AdminName='$adminname'";
		$run=mysqli_query($connectfooddb,$select);
		$count=mysqli_num_rows($run);

		if ($count>0) 
		{
			echo "<script>alert('User Already Exist')</script>";
		}

		else
		{	
			 $ret1=mysqli_query($connectfooddb,
			 	"update admintable1
				SET AdminName='$adminname',
				Email='$email',
				Password='$password',
				Role='$role'
				WHERE AdminID='$id'");
		
			if ($ret1) 
			{
				
				echo "<script>alert('Update Successfully')</script>";
				echo "<script>location='DisplayAdminRegister.php'</script>";
			}
			else
			{
				echo mysqli_error($connectfooddb);
			}
		}
		
	}

 ?>
<form action="AdminUpdate.php" method="post" class="login100-form validate-form flex-sb flex-w">
	<span class="login100-form-title p-b-53">
		Update Admin
	</span>
	
	<div class="p-t-31 p-b-9">
		<span class="txt1">
			AdminID
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="text" value="<?php echo $id ?>" name="txtID"readonly>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Admin Name
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="text" value="<?php echo $adminname?>" name="txtadminname" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-31 p-b-9">
		<span class="txt1">
			Email
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Name is required">
		<input class="input100" type="email" name="txtemail" value="<?php echo $email?>" required>
		<span class="focus-input100"></span>
	</div>
	
	<div class="p-t-13 p-b-9">
		<span class="txt3">
			Admin Password
		</span>

		<!-- <a href="#" class="txt2 bo1 m-l-5">
			Forgot?
		</a> -->
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Admin Password is required">
		<input class="input100" type="text" value="<?php echo $password ?>" name="txtpass" required>
		<span class="focus-input100"></span>
	</div>

	<div class="p-t-13 p-b-9">
		<span class="txt3">
			Role
		</span>

		<!-- <a href="#" class="txt2 bo1 m-l-5">
			Forgot?
		</a> -->
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Role is required">
		<input class="input100" type="text" value="<?php echo $role?>" name="txtrole" >
		<span class="focus-input100"></span>
	</div>
	
	<div class="w-full text-center p-t-55">
		
	</div>

	
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="submit" value="Update" name="btnUpdate" class="login100-form-btn">
		
	</div>
	<div class="container1-login100-form-btn m-t-17">
		
			<input type="reset" value="Cancel" name="btnCancel" class="login100-form-btn">
		
	</div>
	<div class="w-full text-center p-t-55">
		
	</div>
</form>
<?php
include ('footer.php');
?>