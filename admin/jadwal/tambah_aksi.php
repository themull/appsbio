<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $tgl=$_POST['txttanggal'];
  $jam=$_POST['cmbjam'];
  $menit=$_POST['cmbmenit'];
  $waktu=$jam.":".$menit;
  $kegiatan=$_POST['txtkegiatan'];
  $deskripsi=$_POST['txtdeskripsi'];
  $harga=$_POST['txtharga'];


  $waktu=date('H:i:s', strtotime($waktu));

  require_once '../../dbConnect.php';

   $sql="INSERT INTO jadwal (jadwal_tanggal,jadwal_waktu,jadwal_kegiatan,deskripsi,harga) VALUES ('$tgl','$waktu','$kegiatan','$deskripsi','$harga')";

   if (mysqli_query($conn,$sql)) {
     echo '<script language="javascript">
          alert ("Jadwal Berhasil Ditambahkan");
          window.location="jadwal_pelatihan.php";
          </script>';
   }else{
      echo '<script language="javascript">
          alert ("Gagal Tambah Jadwal");
          window.location="tambah_jadwal.php";
          </script>';
          exit();
   }

     
}



?>