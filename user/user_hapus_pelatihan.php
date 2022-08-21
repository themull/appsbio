<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $idpel=$_POST['id_pelatihan'];


  require_once '../dbConnect.php';

$sql= "DELETE FROM pelatihan WHERE id_pelatihan='$idpel'";


     if (mysqli_query($conn,$sql)) {
     $result['success'] = "1";
     $result['message'] = "success";
 
     echo json_encode($result);
      mysqli_close($conn);
    }else  {
    $result['success'] = "0";
    $result['message'] = "error";
    echo json_encode($result);
    mysqli_close($conn);
    }

} 

?>