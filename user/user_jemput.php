<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
  $lokasi=$_POST['lokasi'];
  $ukuran=$_POST['ukuran'];
  $ketisi=$_POST['keteranganisi'];
  $harga=$_POST['harga'];
  $id_user=$_POST['id_user'];

  date_default_timezone_set('Asia/jakarta');
  $tanggal=date("Y-m-d");
  $waktu=date("H:i:s");


  $harga_str = preg_replace("/[^0-9]/", "", $harga);
  $duit=(int)$harga_str;

  require_once '../dbConnect.php';

 $json_response = array();

   $sql="INSERT INTO jemput (jemput_tanggal,jemput_waktu,jemput_tempat,ukuran,keterangan,harga,id_user,status,id_driver,waktu_selesai) VALUES ('$tanggal','$waktu','$lokasi','$ukuran','$ketisi',$duit,'$id_user','1','1','00:00:00')";

     if (mysqli_query($conn,$sql)) {
     $result['success'] = "1";
     $result['message'] = "success";
 
     echo json_encode($result);
    mysqli_close($conn);
    }else  {
    $result['success'] = "0";
    $result['message'] = "error";
    echo json_encode($result);
    mysqli_close($conn);
}

} 


?>