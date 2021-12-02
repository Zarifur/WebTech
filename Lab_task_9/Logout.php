<?php 
	session_start();

	if (isset($_SESSION['name'])) {
		session_destroy();
		header("location:Log_in_Admin.php");
	}
	else{
		header("location:Log_in_Admin.php");
	}

 ?>