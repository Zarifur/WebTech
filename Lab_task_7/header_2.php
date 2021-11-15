<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="header_css.css">
</head>
<body>

<div class="header" style="width: 100%;">
  <a href="#default" class="logo" style="text-align: left;">Let's Find Home</a>
  <div class="header-right" style="float: right;">
    <span><a href="">Welcome &emsp; <?php echo $_SESSION['name'];?></a></span>
    <a href="Logout.php" >Logout</a>
    <!-- <a style="padding: 0px 0px;" href="" ><img src="<?php echo $_SESSION['picture'];?>" height="60" width="60"></a> -->
  </div>
</div>



<div>
  <footer class="fixed_footer">
  <p>Developed By: Zarif Amir Sanad<br>
  <a href="">Zarifsanad@gmail.com</a></p>
  </footer>
</div>


</body>
</html>
