<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$uname = $pass = "" ;

if(!isset($_SESSION["uname"])){
    session_destroy();
    header("location:Log_in_Admin.php");
}

if(isset($_SESSION["uname"]))
{
	 $data=array(
        'uname'=>$uname
    );
	require_once 'C:/xampp/htdocs/WebTech Project/controller/approve_ads.php';

	$ads=array(
	    'House_Owner_ID'=>' ',
	    'AD_Rent'=>' ',
	    'AD_Area'=>' ',
	    'AD_Address'=>' ',
	    'Picture1'=>' ',
	    'Picture2'=>' ',
	    'Picture3'=>' '
	    

	);

	$manage_ads=new getads($data);

	$ads=$manage_ads->getTheads($data);


}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="bootstrap.css" />  
    <!-- 	<link rel="stylesheet" type="text/css" href="deshbord.css"> -->
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
				<h1 style="text-align:center;  text-decoration-line: underline; text-decoration-color: #B2FFFF;">Requested Ads List</h1>
	        <table style="text-align: center;" class="table table-bordered">  
	          <tr>  
	               <th style="text-align: center;">House Owner ID</th> 
	               <th style="text-align: center;">Rent</th>  
	               <th style="text-align: center;">Area</th>   
	               <th style="text-align: center;">Address</th>   
	               <th style="text-align: center;">Picture1</th>
	               <th style="text-align: center;">Picture2</th>  
	               <th style="text-align: center;">Picture3</th>
	               <th style="text-align: center;" colspan="2">descision</th>
	          </tr>
	          <?php
	          foreach($ads as $row)  
	          {  
	                   
	            echo '<tr>
	            <td>'.$row["House_Owner_ID"].'</td>
	            <td>'.$row["AD_Rent"].'</td>
	            <td>'.$row["AD_Area"].'</td>
	            <td>'.$row["AD_Address"].'</td>
	            <td>'.'<img src='.$row["Picture1"].' width="50px" height="50px">'.'</td>
	            <td>'.'<img src='.$row["Picture2"].' width="50px" height="50px">'.'</td>
	            <td>'.'<img src='.$row["Picture3"].' width="50px" height="50px">'.'</td>
	            <td> <a style="color: #65FC6A;" href="">'."Approve".' </a></td>
	            <td> <a style="color: #E43D40;" href="">'."Reject".' </a></td>
	            </tr>'; 
	           }

	           ?>  

	    </table>
			</div>
		</div>

	</form>

</body>
</html>