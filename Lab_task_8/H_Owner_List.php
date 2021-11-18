<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;

if(!isset($_SESSION["uname"])){
    session_destroy();
    header("location:Log_in_Admin.php");
}

if(isset($_SESSION["uname"]))
{
$data=array(

);
	require_once 'C:/xampp/htdocs/WebTech/Lab_task_8/controller/h_owner_list.php';

	$h_owner=array(
	    'nid'=>' ',
	    'email'=>' ',
	    'name'=>' '

	);

	$manage_h_owner=new getowner($data);

	$h_owner=$manage_h_owner->getTheowner($data);


}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="bootstrap.css" />  
    <div class="sticky"><?php include "new_header.php" ?></div>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<br>
		<br>
		<br>
		<br>
		<div style="display: flex;"> 
			<div >
			<?php include "b_class.php" ?>
			</div>
			<div style="width: 1100px; padding: 10px;">
				<h1 style="text-align:center;text-decoration-line: underline; text-decoration-color: #B2FFFF;">House Owner List</h1>
				<table style="text-align: center;" class="table table-bordered">  
	          <tr>  
	               <th style="text-align: center;">NID</th> 
	               <th style="text-align: center;">EMAIL</th>  
	               <th style="text-align: center;">NAME</th>     
	               <th style="text-align: center;">Action</th>
	          </tr>
	          <?php
	          foreach($h_owner as $row)  
	          {  
	                   
	            echo '<tr>
	            <td>'.$row["NID"].'</td>
	            <td>'.$row["Email"].'</td>
	            <td>'.$row["Name"].'</td>
	            <td > <a style="color: #00A0F3;" href="">'."view".' </a></td>
	            </tr>'; 
	           }

	           ?>
			</div>
	   </div>
	</form>

</body>
</html>