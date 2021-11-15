<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;

if(!isset($_SESSION["uname"])){
    session_destroy();
    header("location:Log_in_Admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="bootstrap.css" />  
    <!-- 	<link rel="stylesheet" type="text/css" href="deshbord.css"> -->
    <div class="sticky"><?php include "new_header.php" ?></div>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<br>
		<br>
		<br>
		<br>
	    <div style="display: flex;">
		    <div>
              <?php include "b_class.php" ?>
			</div>
			<div style="width: 1100px; padding: 10px;">
			<h1 style="text-align:center; text-decoration-line: underline; text-decoration-color: #B2FFFF;">Renter's List</h1>
			<table width="100%" style="text-align: center; " class="table table-bordered">  
	          <tr>  
	               <th style="text-align: center;">NID</th> 
	               <th style="text-align: center;">EMAIL</th>  
	               <th style="text-align: center;">NAME</th>     
	               <th style="text-align: center;">Action</th>
	          </tr>

	          <tr>
	            <td>1020425784</td>
	            <td>arpita@gmail.com</td>
	            <td>Arpita Datta</td>
	            <td > <a style="color: #00A0F3;" href="">view </a></td>
	          </tr> 

	           <tr>
	            <td>1020425784</td>
	            <td>arpita@gmail.com</td>
	            <td>Arpita Datta</td>
	            <td > <a style="color: #00A0F3;" href="">view </a></td>
	          </tr>
			</div>
		</div>

	</form>

</body>
</html>