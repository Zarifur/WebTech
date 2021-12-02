<?php

$User_name= $Password ="";

require_once 'db_connect.php';



function approve_ad($id)
{
    $conn = db_conn();
    $selectQuery = "UPDATE unapprovedads set Decision = ? where AD_ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            "Accepted", $id
        ]);
    } catch (PDOException $e) {
        echo "change profile picture  " . $e->getMessage();
    }
    $conn = null;
    return true;
}

function searchUser($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `unapprovedads` WHERE AD_Area LIKE '%$id%'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function getTheads2($id)
{
    // $id = $_SESSION["uname"];
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `unapprovedads` where AD_Area LIKE '%$id%' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;

    
}







function getTheads($data)
{
    // $id = $_SESSION["uname"];
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `unapprovedads` HAVING Decision IS NULL";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

// function fetchowner($data){
//     $isComplete=false;
//     $data_n2=array(
//         'nid'=>' ',
//         'email'=>' ',
//         'name'=>' '
//     );
//     $curr = file_get_contents("C:/xampp/htdocs/WebTech Project/h_owner.json");  
//     $curr = json_decode($curr, true); 
//     foreach($curr as $row){
//         $data_n2['nid']=$row['NID'];
//         $data_n2['email']=$row['Email'];
//         $data_n2['name']=$row['Name']; 
//         $isComplete=true;
//     }
//         return $curr;
// }

// function fetchads($data){
//     $isComplete=false;
//     $data_n=array(
//     'House_Owner_ID'=>' ',
//     'AD_Rent'=>' ',
//     'AD_Area'=>' ',
//     'AD_Address'=>' ',
//     'Picture1'=>' ',
//     'Picture2'=>' ',
//     'Picture3'=>' '
//     );
//     $cur = file_get_contents("C:/xampp/htdocs/WebTech Project/Ads.json");  
//     $cur = json_decode($cur, true); 
//     foreach($cur as $row){
//         $data_n['House_Owner_ID']=$row['House_Owner_ID'];
//         $data_n['AD_Rent']=$row['AD_Rent'];
//         $data_n['AD_Area']=$row['AD_Area']; 
//         $data_n['AD_Address']=$row['AD_Address'];
//         $data_n['Picture1']=$row['Picture1'];
//         $data_n['Picture2']=$row['Picture2'];
//         $data_n['Picture3']=$row['Picture3'];
//         $isComplete=true;
//     }
//         return $cur;
// }


function EAdminInfo($data){
     $isUpdated = false;
    $conn = db_conn();
    $selectQuery = "UPDATE test set name = ?, email = ?, Gender = ? where uname = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data["name"], $data["email"], $data["gender"], $_SESSION["uname"]
        ]);
    } catch (PDOException $e) {
        echo "Update " . $e->getMessage();
    }
    $_SESSION["name"] = $data["name"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["gender"] = $data["gender"];
    // $isUpdated = true;
    $conn = null;
    if ($isUpdated) 
    {
        return true;
    } else {
        return false;
    }
}



function addHouseOwners($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into house (name, email, nid, pass, gender)
VALUES (:Name, :Email,:NID, :Password,:Gender)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Name' => $data["name"],
            ':Email' => $data["email"],
            ':NID' => $data["nid"],
            ':Password' => $data["pass"],
            ':Gender' => $data["gender"],
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
    $conn = null;
    return true;
}


 function CheckLogin($data)
 { 

    $conn = db_conn();
    $selectQuery = "SELECT * FROM test where uname = ? AND Pass= BINARY ?";;
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$data["uname"], $data["pass"]]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $ches = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;

    if (!empty($ches)) 
    {

        $_SESSION["uname"] = $ches["uname"];
        $_SESSION['name'] = $ches["name"];
        $_SESSION['email'] = $ches["email"];
        $_SESSION['nid'] = $ches["NID"];
        $_SESSION['pass'] = $ches["pass"];
        $_SESSION['gender'] = $ches["Gender"];
        header("location:deshbord.php");
        return true;
 

    } else {
        return false;
    }
      
 }

 ?>