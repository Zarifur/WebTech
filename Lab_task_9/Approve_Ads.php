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
	require_once 'C:/xampp/htdocs/WebTech/Lab_task_8/controller/approve_ads.php';

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

	$ad_Area = "";
    $search_error = "";
    $not_found = "";
    if (isset($_POST["search"])) {
        $ad_Area = $_POST["keyword"];

        if (empty($ad_Area)) {
            $search_error = "Field Cannot Be Empty";
        }
        if (!empty($ad_Area)) {
            require_once 'C:/xampp/htdocs/WebTech/Lab_task_8/controller/search_an_ad.php';
            $search_ad = new Search($ad_Area);
            $searched_Ads = $search_ad->searchAd($ad_Area);

            if (empty($searched_Ads)) {
                $not_found = "No Such Ad Found";
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
				<div>
					<?php include "b_class.php" ?>
				</div>
			<div style="width: 1100px; padding: 10px;">
				<div style="display: flex;">
				<div>
					<label style="text-align : left; font :20px">Requested Ads List</label>
				</div>
				<div>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
					&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	
					<input type="text" name="keyword" placeholder="Type something" id="keyword" value="" onkeyup="search_data(this.value)">
					<!-- <button>Search</button> -->
					</form>
                    <div class="container" id="showD"></div>
				</div>
				</div>
	        <table style="text-align: center; margin-top: 10px;" class="table table-bordered">  
	          <tr>  
	               <th style="text-align: center;">AD_ID</th> 
	               <th style="text-align: center;">Rent</th>  
	               <th style="text-align: center;">Area</th>   
	               <th style="text-align: center;">Address</th>   
<!-- 	               <th style="text-align: center;">Picture1</th>
	               <th style="text-align: center;">Picture2</th>  
	               <th style="text-align: center;">Picture3</th> -->
	               <th style="text-align: center;" colspan="2">descision</th>
	          </tr>
	           <?php
                if (!empty($ads))
                    foreach ($ads as $ad) : ?>
                    <tr class="table-info">
                        <td class="table-info"><a href="show_Ad.php?id=<?php echo $ad['AD_ID'] ?>" class="btn btn-outline-info">View Details</a></td>
                        <td class="table-info"><?php echo $ad['AD_Rent'] ?></td>
                        <td class="table-info"><?php echo $ad['AD_Area'] ?></td>
                        <td class="table-info"><?php echo $ad['AD_Address'] ?></td>
                        <td class="table-info"><a href="controller/approve_ads2.php?id=<?php echo $ad['AD_ID'] ?>" class="btn btn-outline-dark">Approve</a>&nbsp<a href="delete_ad.php?id=<?php echo $ad['AD_ID'] ?>" class="btn btn-outline-danger" )>Delete</a></td>
                    </tr>
                <?php endforeach; ?>  

	    </table>
			</div>
		</div>

	</form>

	 <script>
        function search_data(key) {
            let id;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                id = this.responseText;
                console.log(id);
                document.getElementById("showD").innerHTML = this.responseText;
            }
            xhttp.open("GET", "controller/test.php?key=" + key);
            xhttp.send();
        }
    </script>

</body>
</html>