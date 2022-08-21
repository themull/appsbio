<?php  

 require_once '../dbConnect.php';

 $hasil= mysqli_query($conn,"SELECT * FROM jadwal WHERE YEARWEEK(jadwal_tanggal)=YEARWEEK(NOW())") or die(mysql_error());

 $json_response = array();


if(mysqli_num_rows($hasil)> 0 ){
 while ($row = mysqli_fetch_array($hasil)) {

 	
 	$tgl=date('d F Y', strtotime($row['jadwal_tanggal']));
 	$row['jadwal_tanggal']=$tgl;

 	$jam=date('H:i', strtotime($row['jadwal_waktu']));
 	$row['jadwal_waktu']=$jam;


 	$harga="Rp " . number_format($row['harga'],0,',','.');
 	$row['harga']=$harga;
   
    $json_response[] = $row;
   
 	}
 	echo json_encode(array('read' => $json_response));
 }
else{
 	$d['id_jadwal']="";
 	$d['jadwal_tanggal']="";
 	$d['jadwal_waktu']="";
 	$d['jadwal_kegiatan']="";
 	$d['deskripsi']="";
 	$d['harga']="";
 	$json_response[] = $d;
 	echo json_encode(array('read' => $json_response));
 }
  

?>