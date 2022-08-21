<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $id_pelatihan=$_POST['txtidpelatihan'];
  $stat=$_POST['cmbstatus'];

  require_once '../../dbConnect.php';


   $sql="UPDATE pelatihan SET status='$stat' WHERE id_pelatihan='$id_pelatihan' ";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("Data pelatihan Berhasil dirubah");
          window.location="data_pelatihan.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Merubah Data Pelatihan");
          window.location="data_pelatihan.php";
          </script>';
          exit();
   }
    
}


?>