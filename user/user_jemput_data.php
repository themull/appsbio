<?php  

if ($_SERVER['REQUEST_METHOD']=='POST') {
  

  $id_user=$_POST['id_user'];

 require_once '../dbConnect.php';

 $hasil= mysqli_query($conn,"SELECT * FROM jemput INNER JOIN user ON jemput.id_user=user.id_user INNER JOIN driver ON jemput.id_driver=driver.id_driver WHERE jemput.id_user='$id_user' AND status = '1' OR jemput.id_user='$id_user' AND status = '2' ") or die(mysql_error());
 $json_response = array();


if(mysqli_num_rows($hasil)> 0)  {
 while ($row = mysqli_fetch_array($hasil)) {

 		

 		if ($row['id_driver'] < 1) {
 			$row['id_driver']="";
 		}

 		$json_response[] = $row;
     	   
 }
 echo json_encode(array('read' => $json_response));
}
else {
$sqluser=mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id_user'");

	if(mysqli_num_rows($sqluser)> 0)  {
		 while ($data = mysqli_fetch_array($sqluser)) {

 		$alamat=$data['alamat'];
 		}
	}
	$h['id_driver']="";
	$h['nama_driver']="";
	$h['alamat']=$alamat;
	$h['id_jemput']="";
	$h['status']="";
	$json_response[]=$h;
	echo json_encode(array('read' => $json_response));
}



} 

?>