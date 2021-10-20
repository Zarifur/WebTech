<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;
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
	<link rel="stylesheet" type="text/css" href="testborrd.css">
	<div class="sticky"><?php include "h_test_2.php" ?></div>
</head>
<body>
	<form method="post">
		<div class="tbord fixed">
			<a href="testborrd.php" class="button">Dashbord</a>
			<a href="View_profile.php" class="button">View Profile</a>
			<a href="edit_profile.php" class="button">Edit Profile</a>
			<a href="profile_pic.php" class="button">Change profile pic</a>
			<a href="check_password.php" class="button">Change Password</a>
			<a href="Logout.php" class="button">logout</a>
		</div>
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