<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $nama=$_POST['txtnama'];
  $nohp=$_POST['txtnohp'];
  $username=$_POST['txtusername'];
  $password=$_POST['txtpassword'];

  $password=password_hash($password, PASSWORD_DEFAULT);

  require_once '../../dbConnect.php';

$hasil= mysqli_query($conn,"SELECT * FROM driver WHERE username='$username'") or die(mysql_error());

if(mysqli_num_rows($hasil)> 0){
  
  echo '<script language="javascript">
          alert ("Username Sudah Ada");
          window.location="tambah_driver.php";
          </script>';
          exit();

}else{
   $sql="INSERT INTO driver (nama_driver,no_hp,username,password) VALUES ('$nama','$nohp','$username','$password')";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("Driver Berhasil Ditambahkan");
          window.location="data_driver.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Tambah Driver");
          window.location="tambah_driver.php";
          </script>';
          exit();
   }

     
}

} 


?>