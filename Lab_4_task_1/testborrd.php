<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_SESSION['name'];
	$pass=$_POST["pass"];

     $data = file_get_contents("Admin_data.json");  
     $data = json_decode($data, true);

      foreach($data as $row)  
      { 
      
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
	<form>
		<div class="tbord fixed">
			<a href="testborrd.php" class="button">Dashbord</a>
			<a href="View_profile.php" class="button">View Profile</a>
			<a href="edit_profile.php" class="button">Edit Profile</a>
			<a href="profile_pic.php" class="button">Change profile pic</a>
			<a href="check_password.php" class="button">Change Password</a>
			<a href="Logout.php" class="button">logout</a>
		</div>
		<div class="tbord2 fixed2">
			<legend >Welcome <?php echo $_SESSION['name']; ?></legend>
		</div>
	</form>

</body>
</html>