<!DOCTYPE HTML>  
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="sty.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php
// define variables and set to empty values
$nameErr = $emailErr = $dayErr = $monthErr =  $yearErr = $degreeErr= $groupErr= $genderErr = ""  ;
$name = $email = $day = $month = $year = $BLOOD_GROUP = $deg1= $deg2= $deg3= $deg4= $gender="";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name=test_input($_POST["name"]);
  $day=(int)test_input($_POST["day"]);
  $month=(int)test_input($_POST["month"]);
  $year=(int)test_input($_POST["year"]);



    if (empty($_POST["name"])) 
      {
       $nameErr = "Name is required";
      } 
      else{
        if((str_word_count($name))<2){
            $nameErr="The name must have at least two word";
        }
        else{
            if((preg_match("/[A-Za-z]/", $name[0]))==0){
                $nameErr="The name must have start with litter";  
            }
            else
            {
              if(preg_match( '/^[A-Za-z\s._-]+$/', $name)!==1){
                $nameErr="Name can contain letter,desh,dot and space";  
              }
            }
        }
       }

      if((empty($_POST["email"])))
      {
        $emailErr = "email is required";
      }
      else
      {
        $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
          {
            $emailErr = "Invalid email format";
          }
      }



      if((empty($_POST["day"])) ||(empty($_POST["month"]))||(empty($_POST["year"])))
      {
        $dayErr = "days is required";
      }
      else
      {
        if($day < 32 and $day > 0 )
        {
          if($month <13 and $month >0)
          {
            if($year < 1998 and $year > 1953 )
            {

            }
            else
            {
              $yearErr = "month invalid";
            }

          }
          else
          {
            $monthErr = "month invalid";
          }
        }
        else
        {
          $dayErr = "days invalid";
        }
        
      }



      if (empty($_POST["gender"])) 
      {
        $genderErr = "Gender is required";
      } else 
      {
        $gender = test_input($_POST["gender"]);
      }

      $str = "4";
      $count = (int)$str;
      
      if(empty($_POST["deg1"]))
      {
        $count=$count-1;
      }
      else
      {
          $deg1=test_input($_POST["deg1"]);
      }


      if(empty($_POST["deg2"]))
      {
        $count=$count-1;
      }
      else
      {
        $deg2=test_input($_POST["deg2"]);
      }


      if(empty($_POST["deg3"]))
      {
        $count=$count-1;
      }
      else
      {
        $deg3=test_input($_POST["deg3"]);
      }


      if(empty($_POST["deg4"]))
      {
        $count=$count-1;
      }
      else
      {
        $deg4=test_input($_POST["deg4"]);
      }

      if($count<2)
      {
          $degreeErr="select at least two degree.";
      }

      if (empty($_POST["BLOOD_GROUP"])) 
      {
        $groupErr = "Blood Group is required";
      } 
      else 
      {
        $BLOOD_GROUP= test_input($_POST["BLOOD_GROUP"]);
      }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div class="container" style="background-color:rgb(220, 221, 222)">
  <h2>SUBMIT YOUR INFORMATION</h2>
    <div  >
    <label> Name: 
    <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    </label>
    <br><br>
    </div>

    <div>
     <label> Email: 
    <input type="text" name="email" value="<?php echo $email;?>" >
    <span class="error">* <?php echo $emailErr;?></span>

    </label>
    <br><br>
    </div>

    <div>
       <label> Date Of Birth: 
    <input type="number" name="day" value="<?php if($day==0){}else{echo $day;}?>" style="width: 5%; font-size: 14px;">  /
    <input type="number" name="month" value="<?php if($month==0){}else{echo $month;}?>" style="width: 5%; font-size: 14px;">/
    <input type="number" name="year" value="<?php if($year==0){}else{echo $year;}?>" style="width: 10%; font-size: 14px;">
    <span class="error">* <?php echo $dayErr;?></span>
    <span ><?php echo $monthErr;?></span>
    <span > <?php echo $yearErr;?></span>

    </label>
    <br><br>
    </div>

    <div>
    <label >Gender : <br>
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked"?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked"?> value="Female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked"?> value="other">Other
    <span class="error">*<?php echo $genderErr;?></span>
    </label>
    <br><br>
    </div>

    <div>
    <label disabled>DEGREE</label><br>
     <input type="checkbox" name="deg1" <?php if (isset($deg1) && $deg1=="ssc") echo "checked";?> value="ssc">SSC
     <input type="checkbox" name="deg2" <?php if (isset($deg2) && $deg2=="hsc") echo "checked";?> value="hsc">HSC
     <input type="checkbox" name="deg3" <?php if (isset($deg3) && $deg3=="hsc") echo "checked";?> value="bsc">Bsc
     <input type="checkbox" name="deg4" <?php if (isset($deg4) && $deg4=="msc") echo "checked";?> value="msc">Msc
     <span class="error">* <?php echo $degreeErr;?></span>
     <br><br>
     </div>
     <div>
      <label>BLOOD GROUP:
     </select>
        <select name="BLOOD GROUP">
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP==""){ echo ' selected="selected"'; } ?> value="" selected="BLOOD GROUP" disabled >Select one</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="O-") { echo ' selected="selected"'; } ?> value="O-">O-</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="O+") { echo ' selected="selected"'; } ?> value="O+">O+</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="B+") { echo ' selected="selected"'; } ?> value="B+">B+</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="B-") { echo ' selected="selected"'; } ?> value="B-">B-</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="A+") { echo ' selected="selected"'; } ?> value="A+">A+</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="A-") { echo ' selected="selected"'; } ?> value="A-">A-</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="AB+") { echo ' selected="selected"'; } ?> value="AB+">AB+</option>
      <option <?php if (isset($BLOOD_GROUP) && $BLOOD_GROUP=="AB-") { echo ' selected="selected"'; } ?> value="AB-">AB-</option>      
    </select>
    <span class="error"> *<?php echo $groupErr;?></span>
    </label>
    <br><br>
    <br><br>
    </div>
     <div class="button">
      <input type="submit" name="submit" value="Submit" >
     </div>
    
    
  
</div>  
</form>




</body>
</html>