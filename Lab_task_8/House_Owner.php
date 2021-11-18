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
    $nid =  test_input($_POST["nid"]);
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];

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


    require_once "C:/xampp/htdocs/WebTech/Lab_task_8/controller/Create_Owner.php";
    $h_owner= new addHouseOwner($data);

    $h_owner->addData($data);

    $error=$h_owner->get_error();
    $message=$h_owner->get_message();

    $nameErr=$error["nameErr"];
    $emailErr=$error["emailErr"];
    $nidErr=$error["nidErr"];
    $passErr=$error["passErr"];
    $genderErr=$error["genderErr"];

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create House Owner</title>
	<style type="text/css">
		.error
		{
			color: red;
		}

	</style>
    <link rel="stylesheet" href="bootstrap.css" />  
<!-- 	<link rel="stylesheet" type="text/css" href="deshbord.css"> -->
<div class="sticky"><?php include "new_header.php" ?></div>
</head>
<body>
		<br>
		<br>
		<br>
		<br>
		<div style="display: flex;">
			<div>
            <?php include "b_class.php" ?>
			</div>
			<div  style="width: 900px; padding: 20px;">
				<form method="post" id="contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	            <div>
			      <h2>Create House Owner</h2>
			      <div>
			        <label> 
			        <input placeholder="Name" type="text" name="name" value="<?php echo $name;?>" id="name" class="form-control" onkeyup="return name_verify()" onblur="return name_verify()"  data-toggle="tooltip" data-placement="top">
			        <span class="error" id="nameError"><?php if(!empty($nameErr)){echo $nameErr;} ?></span>
			        </label>
			        <br><br>
			      </div>
<!-- 			      <div>
			        <label> <br>
			        <input  placeholder="Email" type="text" name="email" class="form-control" value="<?php echo $email;?>" >
			        <span class="error"> <?php if(!empty($emailErr)){echo $emailErr;}?></span>
			        </label>
			        <br><br>
			      </div> -->
			        <div>
			        <label> <br>
			        <input placeholder="NID" type="text" name="nid" id="nid" value="<?php echo $nid;?>" class="form-control" onkeyup="return nidVerify()" onblur="return nidVerify()" data-toggle="tooltip" data-placement="top" >
			        <span class="error" id="nidError"><?php if(!empty($nidErr)){echo $nidErr;} ?></span>
			        </label>
			        <br><br>
			      </div>
			      <div>
			        <label> <br>
			        <input placeholder="Password" type="Password" name="pass" id="pass" value="<?php echo $pass;?>" class="form-control" onkeyup="return passVerify()" onblur="return passVerify()" data-toggle="tooltip" data-placement="top">
			        <span class="error" id="passError"><?php if(!empty($passErr)){echo $passErr;}?></span>
			        </label>
			        <br><br>
			      </div>
			      <div>
			        <label> <br>
			        <input  placeholder="Retype Password" type="Password" name="pass2" id="pass2" value="<?php echo $pass2;?>" class="form-control" onkeyup="return cpassVerify()" onblur="return cpassVerify()" data-toggle="tooltip" data-placement="top">
			        <span class="error" id="cpassError"><?php  if(!empty($cpassError)){echo $cpassError;}?></span>
			        </label>
			        <br><br>
			      </div>
			      <div>
			      <label >Gender : <br>
			      <input type="radio" name="gender" id="m" <?php if (isset($gender) && $gender=="male") echo "checked"?> value="male">Male
			      <input type="radio" name="gender" id="f" <?php if (isset($gender) && $gender=="Female") echo "checked"?> value="Female">Female
			      <input type="radio" name="gender" id="p" <?php if (isset($gender) && $gender=="other") echo "checked"?> value="other">Other
			      <span class="error" id="genderError"><?php if(!empty($genderErr)){echo $genderErr;}?></span>
			      </label>
			      <br><br>
			      </div>
			       <div>
			        <input class="button1" type="submit" name="submit" value="Submit" >
			       </div>
			       <div>
			       	<span>
					    <?php
			            if (isset($message)) {
			                echo "<span style='color:green'><b>" . $message . "</b></span><br>";
			            }
					    ?>
			       	</span>
			       </div>
			    </div>  
			  </form>
			</div>
		</div>
		<script type="text/javascript" src="js/form_validations.js"></script>
</body>
</html>