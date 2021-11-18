<?php
// $PAS= $PAS2="";
include 'C:/xampp/htdocs/WebTech/Lab_task_8/model/model.php';

      // $PAS=$data["pass"];
      // $PAS2=$data["pass2"];
class addHouseOwner{
    public $error=array(
        'nameErr'=>"",
        'emailErr' =>"",
        'passErr'=>"",
        'nidErr' =>"",
        'genderErr' =>"",
    );
    public $message="";
  
    function addData($data)
    {
      if (empty($data["name"])) {
          $this-> error["nameErr"] = "Name is required";
      } else {
          if ((str_word_count($data["name"])) < 2) {
            $this-> error["nameErr"] = "The name must have at least two word";
          } else {
              if ((preg_match("/[A-Za-z]/", $data["name"][0])) == 0) {
                $this-> error["nameErr"] = "The name must have start with litter";
              } else {
                  if (preg_match('/^[A-Za-z\s._-]+$/', $data["name"]) !== 1) {
                    $this-> error["nameErr"] = "Name can contain letter,desh,dot and space";
                  }
              }
          }
      }
  
      if (empty($data["email"])) {
        $this-> error["emailErr"] = "Email is required";
      } else {
          if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this-> error["emailErr"] = "Invalid email format";
          }
      }
  
      if (empty($data["pass"])) 
      {
        $this-> error["passErr"] = "Password is required";
      } 
      else 
      {
          if (strlen($data["pass"]) < 9) 
          {
            $this-> error["passErr"] = "Password must contain at least 8 character";
          } 
          else 
          {
  
              if (preg_match('/[#$%@]/', $data["pass"]) !== 1) 
              {
                $this-> error["passErr"] = "Password have to contain at least one '#' or '$' or '%' or '@'";
              }
              else
              {
                if(strcmp($data["pass"],$data["pass2"])!==0)
                {
                  $this-> error["passErr"] ="password does not match";
                }

              }

              

          }
      }




  
      if (empty($data["nid"])) {
        $this-> error["nidErr"] = "NID required";
      } else {
          if (strlen($data["nid"])!=10) {
            $this-> error["nidErr"] = "NID Must be 10 Numbers";
          }
      }
  
      if (empty($data["gender"])){
        $this-> error["genderErr"] = "Gender is required";
      }

      if(empty($this-> error["nameErr"]) && empty($this-> error["emailErr"]) && empty($this-> error["nidErr"]) && empty($this-> error["passErr"]) && empty($this-> error["genderErr"])){

        if(addHouseOwners($data)){
            $this->message="Registration Successful";
        }
        else{
            $this->message="Unable to do Registration";
        }

      }
  
    }


    function get_error(){
        return $this -> error;
    }

    function get_message(){
        return $this -> message;
    }
}
?>