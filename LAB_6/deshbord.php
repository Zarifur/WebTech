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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<link rel="stylesheet" type="text/css" href="deshbord.css">
	<div class="sticky"><?php include "header_2.php" ?></div>
</head>
<body class="body">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		
		<div class="tbord2 fixed2">
			<legend >Welcome <?php echo $_SESSION['name']; ?></legend>
		</div>
	</form>

</body>
</html>