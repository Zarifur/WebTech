<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$uname = $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$uname=$_POST["uname"];
	$pass=$_POST["pass"];


     if (empty($_POST["uname"])) 
     {
     	$masage="Username is empty";
     }
     else
     {
     	if (strlen($uname) <3) 
     	{
     		$masage="name must more then 2 characters";
     	}
     	else
     	{
     		if(preg_match( '/^[A-Za-z\s._-]+$/', $uname)!==1)
     		{
              $masage ="Name can contain letter,desh,dot and space";  
            }
     	}

     }
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
     	}
     }


     $data = file_get_contents("Admin_data.json");  
     $data = json_decode($data, true);

      foreach($data as $row)  
      { 

          if ($_POST["uname"]==$row["uname"]&& $_POST["pass"]==$row["pass"]) 
          {
              
              
              $_SESSION['name'] = $row["name"];
              $_SESSION['email'] = $row["email"];
              $_SESSION['uname'] = $row["uname"];
              $_SESSION['pass'] = $row["pass"];
              $_SESSION['dob'] = $row["dob"];
              $_SESSION['gender']=$row["gender"];
              $_SESSION['picture']=$row["picture"];
          	header("location:testborrd.php");
	     }
	     else
	     {
	     	$masage3 = "name or password is incorrect!!!!";
	     }
      
      }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="Admin_sty.css">

	<!--  <include src="h_test.php"></include> -->
	<div class="sticky"><?php include "h_test.php" ?></div>
	
</head>
<body>	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
		<div class="box">
		<section style="flex: all;">
			<div>
					<h1 style="text-align: center;">Login</h1>
			<div >
			<label>
				User Name:<br>
				<input type="text" name="uname" value="<?php echo $uname;?>">
				 <span style="color: red">* <?php echo $masage;?></span>
			</label>
		</div>
		<div>
			<label>
				Password:<br>
				<input type="Password" name="pass" value="<?php echo $pass;?>">
				<span style="color: red">* <?php echo $masage2;?></span>
			</label>
		</div>		
		<div>
			<label>
				<input type="checkbox" name="remamber">
				Remamber Me
			</label>
		</div>
		<div>
			<input type="submit" name="submit">
		</div>
		<span style="color: red">* <?php echo $masage3;?></span>
		<div>
			<a href="pass.php">Forgot Password</a>
		</div>
			</div>
<!-- 			<div>
				<div class="box.pic">
					<img src="Admin.png" height="100" width="100">
				</div>
			</div> -->
		</section>		
		</div>
	</form>

</body>
</html>