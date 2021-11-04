<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;

if(!isset($_SESSION["uname"])){
    session_destroy();
    header("location:Log_in_Admin.php");
}

    $uName=    $_SESSION["uname"]; 
      $Name=  $_SESSION['name'] ;
      $email=  $_SESSION['email'] ;
        $Nid= $_SESSION['nid'] ;
        $pass=$_SESSION['pass']; 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="deshbord.css">
	<div class="sticky"><?php include "header_2.php" ?></div>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<div class="tbord2 fixed2">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div style="color: white;">
		      <h2>ADMIN'S INFORMATION</h2>
		      <div  >
		        <label> Name: 
		        <span><?php echo $Name; ?></span>
		        </label>
		        <br><br>
		      </div>
		      <div>
		        <label> Email: 
		        <span><?php echo $email; ?></span>
		        </label>
		        <br><br>
		      </div>
		        <div>
		        <label> NID: 
		        <span><?php echo $_SESSION['nid']; ?></span>
		        </label>
		        <br><br>
		      </div>
		      <!-- <div>
		      <label> Date Of Birth: 
              <span><?php echo $_SESSION['dob']; ?></span>
		      </label>
		      <br><br>
		      </div> -->
<!-- 		      <div>
		      <label >Gender : 
		      <span><?php echo $_SESSION['gender']; ?></span>
		      </label>
 -->		      <!-- <div class="pfixed">
		      <label >Profile Picture :<br> 
		      <span><img src="<?php echo $_SESSION['picture'];?>" width=250px height=200px></span>
		      </div> -->
		      <br><br>
		      </div>
		    </div>  
		  </form>
		</div>
	</form>

</body>
</html>