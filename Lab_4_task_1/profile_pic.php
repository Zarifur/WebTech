<?php
 session_start();
$masage=  $masage3 = $masage2 = "";
$name = $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_SESSION['name'];
	$pass=$_POST["pass"];

     $data = file_get_contents("Admin_data.json");  
     $data = json_decode($data, true);

      foreach($data as $row)  
      { 
      
      }

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
	<form>
		<div class="tbord fixed">
			<a href="testborrd.php" class="button">Dashbord</a>
			<a href="View_profile.php" class="button">View Profile</a>
			<a href="edit_profile.php" class="button">Edit Profile</a>
			<a href="profile_pic.php" class="button">Change profile pic</a>
			<a href="#" class="button">Change Password</a>
			<a href="Logout.php" class="button">logout</a>
		</div>
		<div class="tbord2 fixed2">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			  <?php
				 $up = $imp="";
				 $imp="<img src=dfult.png height=200 width=300 />";

					if(isset($_POST["submit"])) {
					$target_dir = "Photos/";
					$target_file = $target_dir . basename($_FILES["Upload"]["name"]);
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					// Check if image file is a actual image or fake image
					 $check = getimagesize($_FILES["Upload"]["tmp_name"]);
					  if($check !== false) {
					    echo "File is an image - " . $check["mime"] . ".";
					    $uploadOk = 1;
					  } else {
					    echo "File is not an image.";
					    $uploadOk = 0;
					  }

					// Check if file already exists
					if (file_exists($target_file)) {
					  echo "Sorry, file already exists.";
					  $uploadOk = 0;
					}

					// Check file size
					if ($_FILES["Upload"]["size"] > 60000000000) {
					  echo "Sorry, your file is too large.";
					  $uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					  echo "Sorry, only JPG, JPEG & PNG files are allowed.";
					  $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					  echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} 
					else 
					{
					  if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
					    echo "The file ". htmlspecialchars( basename( $_FILES["Upload"]["name"])). " has been uploaded.";

					        $filepath = $target_dir . htmlspecialchars(basename($_FILES["Upload"]["name"]));
		                    $data = file_get_contents("Admin_data.json");
		                    $data = json_decode($data, true);
		                    if (!empty($data)) {
		                        foreach ($data as $key => $row) {
		                            if ($row["uname"] == $_SESSION['uname']) {
		                                $data[$key]['picture'] = $filepath;
		                                $_SESSION['picture'] = $filepath;
		                                break;
		                            }
		                        }

                        file_put_contents('Admin_data.json', json_encode($data));

                        $imp="<img src=".$_SESSION['picture'] ." height=200 width=300 />";
					   }
					}
					  else 
					  {
					    echo "Sorry, there was an error uploading your file.";
					  }
					}
					}
					else{
					  echo "no file choosen";
					}

				 
				?>	
			Select image to upload:<br>
			<br>
			<span><?php echo "$imp";?></span>
			<br><br>
			<input type="file" name="Upload" id="Upload">
			<br>
		    <input type="submit" value="Upload Image" name="submit">
		    </form>
		</div>
	</form>

</body>
</html>





























<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	

</body>
</html>