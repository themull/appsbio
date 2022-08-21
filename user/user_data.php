<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  

  $id_user=$_POST['id_user'];

  require_once '../dbConnect.php';

  $sql="SELECT * FROM user WHERE id_user='$id_user' ";

  $response = mysqli_query($conn,$sql);

  $result=array();
  $result['read']=array();

 if (mysqli_num_rows($response)== 1 ) {  


   if ($row = mysqli_fetch_assoc($response)) {

      $d['nama']=$row['nama'];
      $d['email']=$row['email'];
      $d['phone']=$row['no_hp'];
      $d['alamat']=$row['alamat'];

      array_push($result['read'], $d);

    $result['success'] = "1";
    $result['message'] = "success";
      echo json_encode($result);
    }

    else{

    $result['success'] = "0";
    $result['message'] = "error";
      echo json_encode($result);

      mysqli_close($conn);
    } 
 } 
}
?>