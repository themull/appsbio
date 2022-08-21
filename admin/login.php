<?php
session_start();
// pemanggilan file koneksi
require_once "../dbConnect.php";

// pembuatan variabel pada penginputan username dan password
$username = $_POST['txtusername'];
$password = $_POST['txtpassword'];

$admin=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");



// Pilihan pengguna
if (mysqli_num_rows($admin)) {

	$row = mysqli_fetch_array($admin);

	
	if (password_verify($password, $row['password'])) {

    $_SESSION['username'] = $username;
	
		
			echo '<script language="javascript">
				  alert ("Selamat Datang Adminku");
				  window.location="beranda.php";
				  </script>';
      
    }


		

}else{echo '<script language="javascript">
				  alert ("Anda Gagal Login");
				  window.location="index.php";
				  </script>';
				  exit();}

?>
