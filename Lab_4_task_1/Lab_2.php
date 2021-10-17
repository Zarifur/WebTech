<?php
$nameErr = $emailErr = $dobErr =  $unErr = $passErr = $message = $genderErr = ""  ;
$name = $email = $dob = $uname = $pass = $pass2 = $gender= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name=test_input($_POST["name"]);
  $uname=test_input($_POST["uname"]);
  $pass=test_input($_POST["pass"]);
  $pass2=test_input($_POST["pass2"]);
  $dob=(int)test_input($_POST["dob"]);
/*  $name=$_POST["name"];
  $un=$_POST["un"];
  $pass=$_POST["pass"];
  $pass2=$_POST["pass2"];
  $day=$_POST["day"];
  $month=$_POST["month"];
  $year=$_POST["year"];
*/

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
      if ((empty($_POST["uname"]))) 
      {
        $unErr= "enter user name";
      }
      else
      {
         if((str_word_count($uname))<2)
         {

          if((preg_match("/[A-Za-z]/", $uname[0]))==0){
              $unErr="The name must have start with litter";  
          }
          else
          {
            if(preg_match( '/^[A-Za-z\s._-]+$/', $uname)!==1)
            {
              $unErr="Name can contain letter,desh,dot and space";  
            }
          }
         }
      }
      if ((empty($_POST["pass"]))) 
      {
        $passErr=" enter password";
      }
      else
      {
        if(strcasecmp($pass, $pass2)==1)
        {
          $passErr="password does not match";
        }

      }
      if (empty($_POST["dob"])) {
            $dobErr = "Date of Birth required";
        } else {
            if ($_POST["dob"] > date('Y-m-d')) {
                $dobErr = "Invalide input";
            } else {
                $dob = $_POST["dob"];
            }
        }

      if (empty($_POST["gender"])) 
      {
        $genderErr = "Gender is required";
      } 
      else 
      {
        $gender = test_input($_POST["gender"]);
      }

      if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["uname"]) && !empty($_POST["pass"]) &&   !empty($_POST["dob"])  && !empty($_POST["gender"])) 
      {
        if(file_exists('Admin_data.json'))  
       {  
        $current_data = file_get_contents('Admin_data.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
             'name'       =>     $_POST['name'],  
             'email'      =>     $_POST["email"],  
             'uname'      =>     $_POST["uname"],
             'pass'       =>     $_POST["pass"],   
             'dob'        =>     $_POST["dob"],
             'gender'     =>     $_POST["gender"],
             'picture'    =>     "dfult.png"
        );  
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('Admin_data.json', $final_data))  
        {  
             $message = "<label class='text-success'>File Appended Success fully</p>";  
        }  
       }  
       else  
       {  
            $error = 'JSON File does not exist';  
       }
      
        //

     
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE HTML>  
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="sty.css">
  <div class="sticky"><?php include "h_test.php" ?></div>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

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
        <label> User Name: 
        <input type="text" name="uname" value="<?php echo $uname;?>" >
        <span class="error">* <?php echo $unErr;?></span>
        </label>
        <br><br>
      </div>
      <div>
        <label> Password: 
        <input type="Password" name="pass" value="<?php echo $pass;?>" >
        <span class="error">* <?php echo $passErr;?></span>
        </label>
        <br><br>
      </div>
      <div>
        <label> Retype Password: 
        <input type="Password" name="pass2" value="<?php echo $pass2;?>" >
        <span class="error">* <?php echo $passErr;?></span>
        </label>
        <br><br>
      </div>

      <div>
      <label> Date Of Birth: 
      <input type="Date" name="dob" value="<?php echo $dob;?>">
      <span class="error">* <?php echo $dobErr;?></span>
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
       <div class="button">
        <input type="submit" name="submit" value="Submit" >
       </div>
       <div>
         <span style="color: green;">
           <?php
           echo $message;
           ?>
         </span>
       </div>
    </div>  
  </form>
</body>
</html>