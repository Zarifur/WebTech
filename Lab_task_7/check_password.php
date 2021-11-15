<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;

if(!isset($_SESSION["uname"])){
    session_destroy();
    header("location:Log_in_Admin.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$pass=$_POST["pass"];

     $data = file_get_contents("Admin_data.json");  
     $data = json_decode($data, true);

     if($_POST["pass"]==$_SESSION['pass'])
     {
     	header("location:change_password.php");   	
     }
     else
     {
     	$masage="incorrect password";
     }

}
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
<body>
	<form method="post">
		<div class="tbord2 fixed2">
			<form method="post" action=""> 
		    <div>
		      <h2>Check Password</h2>
		      <div>
		        <label> Password: 
		        <input type="Password" name="pass" value="<?php echo $pass;?>" >
		        <span class="error"><?php echo $masage;?></span>
		        </label>
		        <br><br>
		      </div>
		       <div>
		        <input type="submit" name="submit" value="Submit" >
		       </div>
		    </div>  
		  </form>
		</div>
	</form>

</body>
</html>