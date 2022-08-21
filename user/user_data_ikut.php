<?php  

if ($_SERVER['REQUEST_METHOD']=='POST') {
  

  $id_user=$_POST['id_user'];

 require_once '../dbConnect.php';

 $hasil= mysqli_query($conn,"SELECT * FROM pelatihan WHERE id_user='$id_user'") or die(mysql_error());

 $json_response = array();


if(mysqli_num_rows($hasil)>0 ){
 while ($row = mysqli_fetch_array($hasil)) {

 $d['pidpel']=$row['id_pelatihan'];
 $d['pkegiatan']=$row['pelatihan_kegiatan'];
 $d['pwaktu']=$row['pelatihan_waktu'];
 $d['ptanggal']=$row['pelatihan_tanggal'];
 $d['pdeskripsi']=$row['deskripsi'];
 $harga="Rp " . number_format($row['harga'],0,',','.');
 $row['harga']=$harga;
 $d['pharga']=$row['harga'];
 $d['pidjadwal']=$row['id_jadwal'];
 $d['pstatus']=$row['status'];

	$json_response[] = $d; 
 }
 echo json_encode(array('read' => $json_response));
}
else{
 $d['pidpel']="";
 $d['pkegiatan']="";
 $d['pwaktu']="";
 $d['ptanggal']="";
 $d['pdeskripsi']="";
 $d['pharga']="";
 $d['pidjadwal']="";
 $d['pstatus']="";
 $json_response[] = $d;
 echo json_encode(array('read' => $json_response));
} 
}

?>