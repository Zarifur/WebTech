<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;

// if(!isset($_SESSION["uname"])){
//     session_destroy();
//     header("location:Log_in_Admin.php");
// }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title> 
    <link rel="stylesheet" href="bootstrap.css" />  
    <!-- 	<link rel="stylesheet" type="text/css" href="deshbord.css"> -->
    <div class="sticky"><?php include "new_header.php" ?></div>
    <div ></div>
	
</head>
<body class="body">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<br>
		<br>
		<br>
		<br>
		<div style="display: flex;">
			<div>
			  <?php include "b_class.php" ?>
		    </div>
		    <br>
		    <div class="tbord2 fixed2">
			   <legend >Welcome <?php echo $_SESSION['name']; ?></legend>
		    </div>
		</div>
	</form>
<?php include "t_foot.php" ?>
</body>
</html>