<?php
session_start();


		echo"<script>alert('Logout')</script>";
			echo "<script>location='Login.php'</script>";

session_destroy();

?>