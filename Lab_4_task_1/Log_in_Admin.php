<?php
$masage= $masage2 = "";
$name = $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_POST["name"];
	$pass=$_POST["pass"];
	// $uname=$data["name"];
	// $upass=$data["pass"];




     // foreach($data as $row)  
     //  {
     //  	// if ($row["name"] == $name && $row["pass"] == $pass)
     //  	if((strcasecmp($name, $row["name"]) ==1) && (strcasecmp($pass, $row["pass"])==1))
     //  	{
     //  		$masage="login successful"; 
     //  	}
     //  }  
     // if((strcasecmp($name, $data["name"]) ==1) && (strcasecmp($pass, $data["pass"])==1))
     // {
     	
     // }
     // else
     // {
     // 	$masage="invalid user or password";
     // }


     if (empty($_POST["name"])) 
     {
     	$masage="name is empty";
     }
     else
     {
     	if (strlen($name) <3) 
     	{
     		$masage="name must more then 2 characters";
     	}
     	else
     	{
     		if(preg_match( '/^[A-Za-z\s._-]+$/', $name)!==1)
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

           if ($_POST["name"]==$row["name"]&& $_POST["pass"]==$row["pass"]) {
     	
         	header("location:log_home.php");
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
				<input type="text" name="name" value="<?php echo $name;?>">
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
		<?php
		//echo $masage;
		?>
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