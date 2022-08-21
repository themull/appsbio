<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $nama=$_POST['txtnama'];
  $email=$_POST['txtemail'];
  $nohp=$_POST['txtnohp'];
  $alamat=$_POST['txtalamat'];
  $password=$_POST['txtpassword'];

  $password=password_hash($password, PASSWORD_DEFAULT);

  require_once '../../dbConnect.php';

$hasil= mysqli_query($conn,"SELECT * FROM user WHERE email='$email'") or die(mysql_error());

if(mysqli_num_rows($hasil)> 0){
  
  echo '<script language="javascript">
          alert ("Email Sudah Ada");
          window.location="tambah_user.php";
          </script>';
          exit();

}else{
   $sql="INSERT INTO user (nama,email,no_hp,alamat,password) VALUES ('$nama','$email','$nohp','$alamat','$password')";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("User Berhasil Ditambahkan");
          window.location="data_user.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Tambah User");
          window.location="tambah_user.php";
          </script>';
          exit();
   }

     
}

} 


?>