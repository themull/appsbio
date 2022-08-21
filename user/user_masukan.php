<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $nohp=$_POST['nohp'];
  $alamat=$_POST['alamat'];
  $password= password_hash($_POST['password'], PASSWORD_DEFAULT);

  require_once '../dbConnect.php';

  $hasil= mysqli_query($conn,"SELECT * FROM user WHERE email='$email'") or die(mysql_error());

 $json_response = array();


if(mysqli_num_rows($hasil)> 0){
  
  $result['success'] = "0";
   $result['message'] = "error";

}else{
   $sql="INSERT INTO user (nama,email,no_hp,alamat,password) VALUES ('$nama','$email','$nohp','$alamat','$password')";

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
}

?>