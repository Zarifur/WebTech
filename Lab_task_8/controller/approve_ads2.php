<?php
require_once 'C:/xampp/htdocs/WebTech/Lab_task_8/model/model.php';

$id = $_GET['id'];
if(approve_ad($id))
{
    header("location: ../Approve_Ads.php");
}
else
{
    echo "dasfsdafgdsf";
}


?>