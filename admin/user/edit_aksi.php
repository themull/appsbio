<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $id_user=$_POST['txtiduser'];
  $nama=$_POST['txtnama'];
  $email=$_POST['txtemail'];
  $nohp=$_POST['txtnohp'];
  $alamat=$_POST['txtalamat'];
  $password=$_POST['txtpassword'];

  $password=password_hash($password, PASSWORD_DEFAULT);


  require_once '../../dbConnect.php';


   $sql="UPDATE user SET nama='$nama',email='$email',no_hp='$nohp',alamat='$alamat',password='$password' WHERE id_user='$id_user' ";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("User Berhasil Di Ubah");
          window.location="data_user.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Merubah User");
          window.location="data_user.php";
          </script>';
          exit();
   }
    
}


?>