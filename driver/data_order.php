<?php  

 require_once '../dbConnect.php';

 $hasil= mysqli_query($conn,"SELECT * FROM jemput INNER JOIN user ON user.id_user=jemput.id_user WHERE status ='1'") or die(mysql_error());

 $json_response = array();

if(mysqli_num_rows($hasil)> 0)  {
 while ($row = mysqli_fetch_array($hasil)) {

 		$tgl=date('d F Y', strtotime($row['jemput_tanggal']));
 		$row['jemput_tanggal']=$tgl;

 		$jam=date('H:i', strtotime($row['jemput_waktu']));
 		$row['jemput_waktu']=$jam;


 		$harga="Rp " . number_format($row['harga'],0,',','.');
 		$row['harga']=$harga;

 		$json_response[] = $row;
     	   
 }
 echo json_encode(array('read' => $json_response));
}
else{
	$e['id_jemput']="";
	$e['jemput_tanggal']="";
	$e['jemput_waktu']="";
	$e['jemput_tempat']="";
	$e['ukuran']="";
	$e['keterangan']="";
	$e['harga']="";
	$e['nama']="";
	$e['no_hp']="";
	$json_response[] = $e;
	echo json_encode(array('read' => $json_response));
}
?>

