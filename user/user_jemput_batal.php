<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $id_jemput=$_POST['id_jemput'];


 require_once '../dbConnect.php';

 $json_response = array();

   $sql="UPDATE jemput SET status='4' WHERE id_jemput='$id_jemput' ";

     if (mysqli_query($conn,$sql)) {
     $result['success'] = "1";
     $result['message'] = "success";
 
     echo json_encode($result);
    mysqli_close($conn);
    }else  {
    $result['success'] = "0";
    $result['message'] = "error";
}

} 


?>