<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$uname = $pass = "" ;


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
			<div >
			<?php include "b_class.php" ?>
			</div>
			<img src="">
			<div style="width: 1100px; padding: 10px;">
				<h1 style="text-align:center; text-decoration-line: underline; text-decoration-color: #B2FFFF;">Deleted Ads List</h1>
	        <table width="100%" style="text-align: center;" class="table table-bordered">  
	          <tr>  
	               <th style="text-align: center;">House Owner ID</th> 
	               <th style="text-align: center;">Ad ID</th>  
	               <th style="text-align: center;">ROR</th>   
	               <th style="text-align: center;">Address</th>
	               <th style="text-align: center;">Action</th>   
	          </tr>      
	          <tr>
	            <td>0123542857</td>
	            <td>1001</td>
	            <td>Fake Information</td>
	            <td>Uttara </td>
	            <td><a style="color: #00A0F3;" href="">view</a></td>
	          </tr> 
	 

	    </table>
			</div>
		</div>
	</form>

</body>
</html>