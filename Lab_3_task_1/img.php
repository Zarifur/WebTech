<?php
 $up = $imp="";
 $imp="<img src=Photos/default.jpg height=200 width=300 />";

 // if (!empty($_FILES["Upload"])) 
 // {  echo"test";
 // 	$imp="<img src=".($_FILES["Upload"])." height=200 width=300 />";
 // }

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
	if ($_FILES["Upload"]["size"] > 50000000000) {
	  echo "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
	    $imp="<img src=".$target_file ." height=200 width=300 />";
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		Select image to upload:<br>
		<br>
		<span><?php echo "$imp";?></span>
		<br><br>
		<input type="file" name="Upload" id="Upload">
		<br>
	    <input type="submit" value="Upload Image" name="submit">
	</form>

</body>
</html>