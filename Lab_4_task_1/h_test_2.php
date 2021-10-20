<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="header_css.css">
</head>
<body>

<div class="header">
  <a href="#default" class="logo" style="text-align: left;">CompanyLogo</a>
  <div class="header-right" style="text-align: right;">
    <span><a href="">wellcome &emsp; <?php echo $_SESSION['name'];?></a></span>
    <a href="Logout.php" >Logout</a>
    <a style="padding: 0px 0px;" href="" ><img src="<?php echo $_SESSION['picture'];?>" height="60" width="60"></a>
  </div>
</div>

<div>
  <footer class="fixed_footer">
  <p>Author: Zarif Amir Sanad<br>
  <a href="">Zarifsanad@gmail.com</a></p>
  </footer>
</div>


</body>
</html>
