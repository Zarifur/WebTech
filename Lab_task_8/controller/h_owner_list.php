<?php
require_once 'C:/xampp/htdocs/WebTech Project/model/model.php';

class getowner{

    public $message="";

    function getTheowner($data){
        return fetchowner($data);
    }


}


?>