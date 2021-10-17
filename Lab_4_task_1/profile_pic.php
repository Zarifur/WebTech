<?php
session_start();
 $up = $masage= $masage2= $masage3= $imp="";
 // $imp="<img src=dfult.png height=200 width=300 />";
 $imp="<img src=".$_SESSION['picture'] ." height=200 width=300 />";



	if(isset($_POST["submit"])) {
	$target_dir = "Photos/";
	$target_file = $target_dir . basename($_FILES["Upload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	 $check = getimagesize($_FILES["Upload"]["tmp_name"]);
	  if($check !== false) {
	    $masage="File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    $masage= "File is not an image.";
	    $uploadOk = 0;
	  }

	// Check if file already exists
	if (file_exists($target_file)) {
	  $masage2="Sorry, file already exists.";
	  $uploadOk = 0;
	}

	// Check file size
	if ($_FILES["Upload"]["size"] > 50000000000) {
	  $masage2= "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  $masage2= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  $masage2= "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	else 
	{
	  if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
	    $masage3= "The file ". htmlspecialchars( basename( $_FILES["Upload"]["name"])). " has been uploaded.";
            $data = file_get_contents("Admin_data.json");
            $data = json_decode($data, true);
            if (!empty($data)) {
                foreach ($data as $key => $row) {
                    if ($row["uname"] == $_SESSION['uname']) {
                        $data[$key]['picture'] = $target_file;
                        $_SESSION['picture'] = $target_file;
                        break;
                    }
                }
            }
        file_put_contents('Admin_data.json', json_encode($data));
	    $imp="<img src=".$target_file ." height=200 width=300 />";
	  } 
	  else 
	  {
	    $masage3= "Sorry, there was an error uploading your file.";
	  }
	}
	}
	else{

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

	<form action="" method="post" enctype="multipart/form-data">
	<div class="tbord fixed">
		<a href="testborrd.php" class="button">Dashbord</a>
		<a href="View_profile.php" class="button">View Profile</a>
		<a href="edit_profile.php" class="button">Edit Profile</a>
		<a href="profile_pic.php" class="button">Change profile pic</a>
		<a href="#" class="button">Change Password</a>
		<a href="Logout.php" class="button">logout</a>
	</div>
	<div class="tbord2 fixed2">
		<form action="" method="post" enctype="multipart/form-data">
		Select image to upload:<br>
		<br>
		<span><?php echo "$imp";?></span>
		<br><br>
		<input type="file" name="Upload" id="Upload">
		<br>
	    <input type="submit" value="Upload Image" name="submit">
	    <div>
	    	<span>
	    		<?php
	    	echo $masage;
	    	echo $masage2;
	    	echo $masage3;
	    	 ?>
	    	</span>
	    </div>
	</form>
	</div>
	</form>
</body>
</html>