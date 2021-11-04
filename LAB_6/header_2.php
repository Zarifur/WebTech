<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="header_css.css">
</head>
<body>

<div class="header">
  <a href="#default" class="logo" style="text-align: left;">Let's Find Home</a>
  <div class="header-right" style="text-align: right;">
    <span><a href="">Welcome &emsp; <?php echo $_SESSION['name'];?></a></span>
    <a href="Logout.php" >Logout</a>
    <!-- <a style="padding: 0px 0px;" href="" ><img src="<?php echo $_SESSION['picture'];?>" height="60" width="60"></a> -->
  </div>
</div>


<div class="tbord fixed">
      <a href="deshbord.php" class="button">Dashbord</a>
      <a href="View_Admin.php" class="button">View Profile</a>
      <a href="Edit_Admin.php" class="button">Edit Profile</a>
      <a href="check_password.php" class="button">Change Password</a>
      <a href="Approve_Ads.php" class="button">Approve Ads</a>
      <a href="Manage_Ads.php" class="button">Manage Ads</a>
      <a href="H_Owner_List.php" class="button">House Owner List</a>
      <a href="Renter_List.php" class="button">Renter List</a>
      <a href="House_Owner.php" class="button">Create House Owner</a>
      <a href="Logout.php" class="button">Logout</a>
    </div>

<div>
  <footer class="fixed_footer">
  <p>Developed By: Zarif Amir Sanad<br>
  <a href="">Zarifsanad@gmail.com</a></p>
  </footer>
</div>


</body>
</html>
