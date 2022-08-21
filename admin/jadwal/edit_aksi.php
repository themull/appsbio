<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $idjadwal=$_POST['txtidjadwal'];
  $tgl=$_POST['txttanggal'];
  $jam=$_POST['cmbjam'];
  $menit=$_POST['cmbmenit'];
  $waktu=$jam.":".$menit;
  $kegiatan=$_POST['txtkegiatan'];
  $deskripsi=$_POST['txtdeskripsi'];
  $harga=$_POST['txtharga'];


  $waktu=date('H:i:s', strtotime($waktu));

  require_once '../../dbConnect.php';


   $sql="UPDATE jadwal SET jadwal_tanggal='$tgl',jadwal_waktu='$waktu',jadwal_kegiatan='$kegiatan',deskripsi='$deskripsi',harga='$harga' WHERE id_jadwal='$idjadwal'";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("Data Jadwal Berhasil dirubah");
          window.location="jadwal_pelatihan.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Merubah Data Jadwal");
          window.location="jadwal_pelatihan.php";
          </script>';
          exit();
   }
    
}


?>