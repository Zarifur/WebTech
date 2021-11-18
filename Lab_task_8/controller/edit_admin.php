<?php

include 'C:/xampp/htdocs/WebTech/Lab_task_8/model/model.php';

      // $PAS=$data["pass"];
      // $PAS2=$data["pass2"];
class editData{
    public $error=array(
        'nameErr'=>"",
        'emailErr' =>"",
        'passErr'=>"",
        'nidErr' =>"",
        'genderErr' =>"",
    );
    public $message="";
  
    function edit($data)
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
  
      if (empty($data["gender"])){
        $this-> error["genderErr"] = "Gender is required";
      }

      if(empty($this-> error["nameErr"]) && empty($this-> error["emailErr"]) && empty($this-> error["genderErr"]))
      {
      	// $this->message="Profile Updated";

        if(EAdminInfo($data))
        {
          echo "afasf";
            $this->message="Profile Updated";
        }
        // else
        // {
        //     $this->message="Unable to update profile";
        // }

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

