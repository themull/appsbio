<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
  

  $email=$_POST['email'];
  $password=$_POST['password'];

  require_once '../dbConnect.php';

  $sql="SELECT * FROM user WHERE email='$email' ";

  $response = mysqli_query($conn,$sql);

  $result=array();
  $result['login']=array();

 if (mysqli_num_rows($response)== 1 ) {  

  
   $row = mysqli_fetch_array($response);

   if (password_verify($password, $row['password'])) {

    array_push($result['login'], $row);


    $result['success'] = "1";
    $result['message'] = "success";
    echo json_encode($result);

    mysqli_close($conn);
      
    }

   else{

    $result['success'] = "0";
    $result['message'] = "error";
      echo json_encode($result);

      mysqli_close($conn);
    } 
  
    
}

    else{

    $result['success'] = "0";
    $result['message'] = "error";
      echo json_encode($result);

      mysqli_close($conn);
    } 
 } 
?>