<?php

$User_name= $Password ="";

require_once 'db_connect.php';

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



//     function addHouseOwners($data){
//         if (file_exists("C:/xampp/htdocs/WebTech Project/h_owner.json")) {
//             $current_content = file_get_contents("C:/xampp/htdocs/WebTech Project/h_owner.json");
//             $array_content = json_decode($current_content, true);
//             $new_content = array(
//                 'Name' => $data["name"],
//                 'Email' => $data["email"],
//                 'NID' => $data["nid"],
//                 'Password' => $data["pass"],
//                 'Gender' => $data["gender"],
//                 'Image' => "C:/xampp/htdocs/WebTech Project/dfult.png"
//             );
//             $array_content[] = $new_content;
//             $final_content = json_encode($array_content, JSON_UNESCAPED_SLASHES);
//             if (file_put_contents("C:/xampp/htdocs/WebTech Project/h_owner.json", $final_content)) {
//                 return true;
//             }
//         } else {
//                return false;
//         }
//     }


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