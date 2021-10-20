<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_SESSION['name'];

     $data = file_get_contents("Admin_data.json");  
     $data = json_decode($data, true);
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
			<?php
			$nameErr = $emailErr = $dobErr =  $unErr = $passErr = $message = $genderErr = ""  ;
			$name = $email = $dob = $uname = $pass = $pass2 = $gender= "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
			  $name=test_input($_POST["name"]);
			  $dob=(int)test_input($_POST["dob"]);

			    if (empty($_POST["name"])) 
			      {
			       $nameErr = "Name is required";
			      } 
			      else{
			        if((str_word_count($name))<2){
			            $nameErr="The name must have at least two word";
			        }
			        else{
			            if((preg_match("/[A-Za-z]/", $name[0]))==0){
			                $nameErr="The name must have start with litter";  
			            }
			            else
			            {
			              if(preg_match( '/^[A-Za-z\s._-]+$/', $name)!==1){
			                $nameErr="Name can contain letter,desh,dot and space";  
			              }
			            }
			        }
			       }
			     }

			      if((empty($_POST["email"])))
			      {
			        $emailErr = "email is required";
			      }
			      else
			      {
			        $email = test_input($_POST["email"]);
			          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			          {
			            $emailErr = "Invalid email format";
			          }
			      }
			     
			      if (empty($_POST["dob"])) {
			            $dobErr = "Date of Birth required";
			        } else {
			            if ($_POST["dob"] > date('Y-m-d')) {
			                $dobErr = "Invalide input";
			            } else {
			                $dob = $_POST["dob"];
			            }
			        }

			      if (empty($_POST["gender"])) 
			      {
			        $genderErr = "Gender is required";
			      } 
			      else 
			      {
			        $gender = test_input($_POST["gender"]);
			      }

			      if(empty($nameErr) && empty($emailErr) && empty($genderErr))
			      {
	                    $data = file_get_contents("Admin_data.json");
	                    $data = json_decode($data, true);
	                    if (!empty($data)) {
	                        foreach ($data as $key => $row) 
	                        {
	                            if ($row["uname"] == $_SESSION['uname']) 
	                            {
	                                $data[$key]['name'] = $name;
	                                $_SESSION['name'] = $name;
	                                $data[$key]['email'] = $email;
	                                $_SESSION['email'] = $email;
	                                $data[$key]['dob'] = $dob;
	                                $_SESSION['dob'] = $dob;
	                                $data[$key]['gender'] = $gender;
	                                $_SESSION['gender'] = $gender;
	                                $message = "Information changed!";
	                                break;
	                            }
	                        }

	                        file_put_contents('Admin_data.json', json_encode($data));
			                    }

			         
			         }

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			?>
			  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
			    <div class="container" style="background-color:rgb(220, 221, 222)">
			      <h2>CHANGE INFORMATION</h2>
			      <div  >
			        <label> Name: 
			        <input type="text" name="name" value="<?php  if(empty($name)){echo $_SESSION['name'];}else{echo $name;} ?>">
			        </label>
			        <br><br>
			      </div>

			      <div>
			        <label> Email: 
			        <input type="text" name="email" value="<?php if(empty($email)){echo  $_SESSION['email'];} else{echo $email;} ?>" >			        
			        </label>
			        <br><br>
			      </div>
			      <div>
			      <label> Date Of Birth: 
			      <input type="Date" name="dob" value="<?php if(empty($dob)){echo $_SESSION['dob'];} else{echo $dob;} ?>">
			      </label>
			      <br><br>
			      </div>
			      <div>
			      <label >Gender : <br>
			      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male"){ echo "checked";} elseif($_SESSION['gender']=="male"){echo "checked";} ?> value="male">Male
			      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female"){ echo "checked";} elseif($_SESSION['gender']=="Female"){echo "checked";} ?> value="Female">Female
			      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other"){ echo "checked";} elseif($_SESSION['gender']=="other"){echo "checked";} ?> value="other">Other
			      </label>
			      <br><br>
			      </div>
			       <div>
			        <input type="submit" name="submit" value="Submit" >
			       </div>
			       <div>
			         <span style="color: green;">
			           <?php
			           echo $message;
			           ?>
			         </span>
			       </div>
			    </div>  
			  </form>
		</div>
	</form>

</body>
</html>