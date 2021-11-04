<?php
require_once 'C:/xampp/htdocs/WebTech/LAB_6/model/model.php';
class login{
    public $Error=array(
        'unameErr'=>"",
        'passErr'=>""
    );
    public $message="";
    public $error="";
    function check_login($data)
    {

        if (empty($data["uname"])) 
         {
            $this-> Error["unameErr"]="Username is empty";
         }
         else
         {

         }

         if(empty($data["pass"]))
         {
            $this-> Error["passErr"]="Password is empty";
         }
         else
         {
            if(strlen($data["pass"]) <8)
            {
                $this-> Error["passErr"]="Password must contain 8 characters";
            }
            else
            {
                if(preg_match('/[#$%@]/', $data["pass"])!==1)
                {
                    $this-> Error["passErr"]= "must contain #$%@ any of this characters ";
                }
            }
         }
         if(empty($this-> Error["unameErr"]) && empty($this-> Error["passErr"]))
         {
           if(CheckLogin($data))
          {
           $this->message ="Login Successful";
          }
          else
          {
           $this->err_message="User Name or Password does not match";
          } 
         }

     }

    public $err_message="";

    function get_error(){
        return $this -> Error;
    }

    function get_message(){
        return $this -> message;
    }

    function error_message(){
        return $this->err_message;
    }
}
?>
