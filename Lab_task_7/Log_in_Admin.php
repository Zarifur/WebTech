<?php
 session_start();
 $masage=  $masage3 = $masage2 = "";
 $uname = $pass = "" ;
 $unameErr = $passErr ="";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


 if(isset($_POST["submit"]))
 {

    $uname=test_input($_POST["uname"]);
    $pass=test_input($_POST["pass"]);

    $datas=array(
        'uname'=>$uname,
        'pass'=>$pass,
        'Message'=>""
    );

    require_once 'controller/Validate_login.php';

    $login=new login($datas);

    $login->check_login($datas);
    $error=$login->get_error();
    $message=$login->get_message();
    $err_msg=$login->error_message();

    $unameErr=$error["unameErr"];
    $passErr=$error["passErr"];

    if (!empty($_POST['remember'])) 
     {
	      setcookie("uname", $_POST['uname'], time() + 20);
	      setcookie("pass", $_POST['pass'], time() + 20);
     }

  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="Admin_sty.css">
	<style type="text/css">
		.error
		{
			color: red;
		}
	</style>
	
</head>
<body>	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">	
		<div class="box">
		<section style="flex: all;">
			<div>
				<h1 style="text-align: left;"><img src="logo.png" height="40" width="40" alt="logo">Let's Find Home</h1>
				<label style="font-size: 20px;"><b>Login</b></label>
			<div >
				<br>
			<label>
				<span class="error"><?php if(isset($unameErr)){echo $unameErr;} ?></span>
				<input class="test2" placeholder="User Name" type="text"  name="uname" value="<?php if (isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];} else {echo $uname;}?>">
				 
			</label>
		</div>
		<div>
			<label>
				<span class="error"><?php if(isset($passErr)){echo $passErr;}?></span>
				<input class="test2" placeholder="Password" type="Password" name="pass" value="<?php if (isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} else {echo $pass;}?>">
				 
			</label>
		</div>		
		<div>
			<label>
				<input type="checkbox" name="remember">
				Remamber Me
			</label>
		</div>
		<div>
			<input type="submit"  type="submit" class="button" name="submit" value="Login">
		</div>
		<div>
			<span style="color: red;">
			<?php
            if (isset($err_msg)) {
                echo $err_msg;
            }
            ?>
			</span>
		</div>
			</div>
		</section>		
		</div>
	</form>

</body>
</html>