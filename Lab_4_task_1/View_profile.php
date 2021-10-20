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
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<?php

			$name = $uname = $pass  = $email= $Gender=  $dob="";

	        $data = file_get_contents("Admin_data.json");  
	        $data = json_decode($data, true);  
	        foreach($data as $row)  
	        {  
	                   
               if (isset($_SESSION['uname']))
               {
               	$name=$_SESSION['name'];
               	$uname=$_SESSION['uname'];
		        $pass=$_SESSION['pass'];
		        $email=$_SESSION['email'];
		        $dob=$_SESSION['dob'];
		        $gender=$_SESSION['gender'];

               }
	        }  
	        ?>  
		    <div class="container" style="background-color:rgb(220, 221, 222)">
		      <h2>VIEW INFORMATION</h2>
		      <div  >
		        <label> Name: 
		        <input type="text" name="name" value="<?php echo $name;?>">
		        </label>
		        <br><br>
		      </div>

		      <div>
		        <label> Email: 
		        <input type="text" name="email" value="<?php echo $email;?>" >
		        </label>
		        <br><br>
		      </div>
		      <div>
		        <label> User Name: 
		        <input type="text" name="uname" value="<?php echo $uname;?>" >
		        </label>
		        <br><br>
		      </div>
		      <div>
		        <label> Password: 
		        <input type="Password" name="pass" value="<?php echo $pass;?>" >
		        </label>
		        <br><br>
		      </div>
		      <div>
		      <label> Date Of Birth: 
		      <input type="Date" name="dob" value="<?php echo $dob;?>">
		      </label>
		      <br><br>
		      </div>

		      <div>
		      <label >Gender : <br>
		      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked"?> value="male">Male
		      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked"?> value="Female">Female
		      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked"?> value="other">Other
		      </label>
		      <br><br>
		      </div>
		       <div>
		         <span style="color: green;">
		         </span>
		       </div>
		    </div>  
		  </form>
		</div>
	</form>

</body>
</html>