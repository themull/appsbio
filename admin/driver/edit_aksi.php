<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $id_driver=$_POST['txtidriver'];
  $nama=$_POST['txtnama'];
  $nohp=$_POST['txtnohp'];
  $username=$_POST['txtusername'];
  $password=$_POST['txtpassword'];  

  $password=password_hash($password, PASSWORD_DEFAULT);


  require_once '../../dbConnect.php';


   $sql="UPDATE driver SET nama_driver='$nama',no_hp='$nohp',username='$username', password='$password' WHERE id_driver='$id_driver' ";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("Driver Berhasil Di Ubah");
          window.location="data_driver.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Merubah Driver");
          window.location="data_driver.php";
          </script>';
          exit();
   }
    
}


?>