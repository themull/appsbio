<?php  

if ($_SERVER['REQUEST_METHOD']=='POST') {
  

  $id_user=$_POST['id_user'];

 require_once '../dbConnect.php';

 $hasil= mysqli_query($conn,"SELECT count(*) AS id_pelatihan FROM pelatihan WHERE id_user='$id_user'") or die(mysql_error());

 $json_response = array();


if(mysqli_num_rows($hasil)> 0 ){
 while ($row = mysqli_fetch_array($hasil)) {
 		
    $json_response[] = $row;
 
 }


 echo json_encode(array('read' => $json_response));
} 
}

?>