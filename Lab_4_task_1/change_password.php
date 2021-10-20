<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass2= $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_SESSION['name'];
	$opass=$_SESSION["pass"];
	$pass=$_POST["pass"];
	$pass2=$_POST["pass2"];

     $data = file_get_contents("Admin_data.json");  
     $data = json_decode($data, true);

	 if(empty($_POST["pass"]))
	     {
	     	$masage2="password is empty";
	     }
	     else
	     {
	     	if(strlen($pass) <8)
	     	{
	     		$masage2="password must contain 8 characters";
	     	}
	     	else
	     	{
	     		if(preg_match('/[#$%@]/', $pass)!==1)
	     		{
	     			$masage2= "must contain #$%@ any of this characters ";
	     		}
	     		else
	     		{
	     			if(strcasecmp($pass, $pass2)!==0)
	     			{
	     				$masage2="input password does not match";
	     			}
	     			else
	     			{
	     				if($pass==$opass)
	     				{
	     					$masage2="old password will not be accepted";
	     				}
	     				else
	     				{
	     					if(empty($nameErr) && empty($emailErr) && empty($genderErr))
					      {
	                  $data = file_get_contents("Admin_data.json");
	                  $data = json_decode($data, true);
	                  if (!empty($data)) {
	                      foreach ($data as $key => $row) 
	                      {
	                          if ($row["uname"] == $_SESSION['uname']) 
	                          {
	                              $data[$key]['pass'] = $pass;
	                              $_SESSION['pass'] = $pass;
	                              $masage3="Password change successful";
	                              break;
	                          }
	                      }

	                      file_put_contents('Admin_data.json', json_encode($data));
	                  }

					      }
	     				}
	     			}
	     		}
	     	}
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
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <div class="container" style="background-color:rgb(220, 221, 222)">
      <h2>CHANGE PASSWORD</h2>
      <div>
        <label>Previous Password: 
        <input type="text" name="pass" value="<?php echo $_SESSION['pass'];?>" >
        </label>
        <br><br>
      </div>
      <div>
        <label> Password: 
        <input type="Password" name="pass" value="<?php echo $pass;?>" >
        <span style="color: red">* <?php echo $masage;?></span>
        </label>
        <br><br>
      </div>
      <div>
        <label> Retype Password: 
        <input type="Password" name="pass2" value="<?php echo $pass2;?>" >
        <span style="color : red;">* <?php echo $masage2;?></span>
        </label>
        <br><br>
      </div>

      <div>
      <br><br>
      </div>
       <div>
        <input type="submit" name="submit" value="Submit" >
       </div>
       <div>
         <span style="color: green;">
           <?php
           if(!empty($masage3))
           {
           	echo $masage3;
           }
           ?>
         </span>
       </div>
    </div>  
  </form>
		</div>
	</form>

</body>
</html>