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
    <a href="" class="fixedw"><p><b>wellcome</b></p></a>
    <a class="active" href=""><?php echo $_SESSION['name'];?></a>
    <a href="Logout.php" >Logout</a>
    <a href="" ><img src="<?php echo $_SESSION['picture'];?>" height="50" width="50"></a>
  </div>
</div>

</body>
</html>
