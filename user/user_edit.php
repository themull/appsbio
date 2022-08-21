<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $nohp=$_POST['nohp'];
  $alamat=$_POST['alamat'];
  $id_user=$_POST['id_user'];

  require_once '../dbConnect.php';

  $sql="UPDATE user SET nama='$nama',email='$email',no_hp='$nohp',alamat='$alamat' WHERE id_user='$id_user' ";



  if (mysqli_query($conn,$sql)) {
    $result['success'] = "1";
    $result['message'] = "success";
 
    echo json_encode($result);
    mysqli_close($conn);
  }
  else  {
    $result['success'] = "0";
    $result['message'] = "error";


    echo json_encode($result);
 
    mysqli_close($conn);
  }
}

?>