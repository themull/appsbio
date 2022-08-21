<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $tanggal=$_POST['tanggal'];
  $waktu=$_POST['waktu'];
  $kegiatan=$_POST['kegiatan'];
  $deskripsi=$_POST['deskripsi'];
  $harga=$_POST['harga'];
  $id_jadwal=$_POST['id_jadwal'];
  $id_user=$_POST['id_user'];



  $harga_str = preg_replace("/[^0-9]/", "", $harga);
  $duit=(int)$harga_str;

   $time = strtotime($tanggal);
   $tgl = date('Y-m-d',$time);

   $jam=strtotime($waktu);
   $pukul=date('H:i:s',$jam);


  require_once '../dbConnect.php';

$hasil= mysqli_query($conn,"SELECT id_user,id_jadwal FROM pelatihan WHERE id_jadwal='$id_jadwal' AND id_user='$id_user' ") or die(mysql_error());

 $json_response = array();

if(mysqli_num_rows($hasil)> 0){
  
  $result['success'] = "0";
  $result['message'] = "error";

}else{

  $sql="INSERT INTO pelatihan (pelatihan_tanggal,pelatihan_waktu,pelatihan_kegiatan,deskripsi,harga,id_jadwal,id_user,status) VALUES ('$tgl','$pukul','$kegiatan','$deskripsi','$duit','$id_jadwal','$id_user','1')";


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