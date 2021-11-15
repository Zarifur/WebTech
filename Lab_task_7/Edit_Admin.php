<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$nameErr = $emailErr = $passErr = $message = $nidErr =$genderErr = ""  ;
$name = $email = $dob = $uname = $pass = $nid = $pass2 = $gender= "";


if(!isset($_SESSION["uname"])){
    session_destroy();
    header("location:Log_in_Admin.php");
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if(isset($_POST["submit"])){
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);

    if(!empty($_POST["gender"])){
        $gender=$_POST["gender"];
    }
    else{
        $gender="";
    }

    $data= array(
        'name'=> $name,
        'email'=>$email,
        'nid'=>$nid,
        'pass'=>$pass,
        'pass2'=>$pass2,
        'gender'=>$gender
    );


    require_once "C:/xampp/htdocs/WebTech/Lab_task_7/controller/edit_admin.php";
    $edit_profile= new editData($data);

    $edit_profile->edit($data);

    $error=$edit_profile->get_error();
    $message=$edit_profile->get_message();

    $nameErr=$error["nameErr"];
    $emailErr=$error["emailErr"];
    $nidErr=$error["nidErr"];
    $genderErr=$error["genderErr"];

 }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="bootstrap.css" /> 
<!-- 	<link rel="stylesheet" type="text/css" href="deshbord.css">
 -->	<div class="sticky"><?php include "new_header.php" ?></div>
	<style type="text/css">
		.error
		{
			color: red;
		}

	</style>
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
			<div>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
			    <div class="" style="color :black;  ">
			      <h2>CHANGE INFORMATION</h2>
			      <div >
			        <label  > Name: 
			        <input class="test2" type="text" name="name" value="<?php  if(empty($name)){echo $_SESSION['name'];}else{echo $name;} ?>">
			        <span class="error"><?php if(!empty($nameErr)){echo $nameErr;} ?></span>
			        </label>
			        <br><br>
			      </div>
			      <div>
			        <label > Email: 
			        <input class="test2"  type="text" name="email" value="<?php if(empty($email)){echo  $_SESSION['email'];} else{echo $email;} ?>" >	
			        
			        <span class="error"> <?php if(!empty($emailErr)){echo $emailErr;}?></span>		        
			        </label>
			        <br><br>
			      </div>
			      <div>
			      <label >Gender : <br>
			      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male"){ echo "checked";} elseif($_SESSION['gender']=="Male"){echo "checked";} ?> value="Male">Male
			      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female"){ echo "checked";} elseif($_SESSION['gender']=="Female"){echo "checked";} ?> value="Female">Female
			      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other"){ echo "checked";} elseif($_SESSION['gender']=="other"){echo "checked";} ?> value="other">Other
			      </label>
			      <span class="error"><?php if(!empty($genderErr)){echo $genderErr;}?></span>
			      <br><br>
			      </div>
			       <div>
			        <input class="button1" type="submit" name="submit" value="Submit" >
			       </div>
			       <div>
			         <span style="color: green;">
			           <?php
			           if(isset ($message))
			           {
			           	echo $message;
			           }
			           ?>
			         </span>
			       </div>
			    </div>  
			  </form>
		   </div>
		</div>
	</form>

</body>
</html>