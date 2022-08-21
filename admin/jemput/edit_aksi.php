<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $id_jemput=$_POST['txtidjemput'];
  $stat=$_POST['cmbstatus'];
  $iddriver=$_POST['txtiddriver'];
  $waktuambil=$_POST['txtwaktuambil'];

  require_once '../../dbConnect.php';


   $sql="UPDATE jemput SET status='$stat', id_driver='$iddriver', waktu_selesai='$waktuambil' WHERE id_jemput='$id_jemput' ";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("Data Jemput Berhasil dirubah");
          window.location="data_jemput.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Merubah Data Jemput");
          window.location="data_jemput.php";
          </script>';
          exit();
   }
    
}


?>