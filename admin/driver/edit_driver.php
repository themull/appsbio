<?php

session_start();
if (empty($_SESSION['username'])) {
  echo "<center>Untuk mengakses halaman ini, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else {
?>

<html>
<head>
	<title>Admin Aplikasi Biomagg</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="../assets/fontawesome-free-5.11.2-web/css/fontawesome.css" rel="stylesheet">
 	<link href="../assets/fontawesome-free-5.11.2-web/css/brands.css" rel="stylesheet">
 	<link href="../assets/fontawesome-free-5.11.2-web/css/solid.css" rel="stylesheet">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	
	<div class="header">
		<div class="logo"><a href="../beranda.php"><span>Aplikasi</span>Biomagg</a></div>
	</div>

	<div class="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a href="../beranda.php" ><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
				<li><a href="../user/data_user.php"><i class="fab fa-android"></i>Data User</a></li>
                <li><a href="data_driver.php" class="selected"><i class="fa fa-user"></i>Data Driver</a></li>
				<li><a href="../jemput/data_jemput.php"><i class="fa fa-truck"></i>Data Jemput</a></li>
				<li><a href="../jadwal/jadwal_pelatihan.php"><i class="fa fa-chalkboard-teacher"></i>Jadwal Pelatihan</a></li>
				<li><a href="../pelatihan/data_pelatihan.php"><i class="fa fa-user-graduate"></i>Data Pelatihan</a></li>
				<li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

			</ul>
		</div>

<div class="content">
<div class="form_input">
	<div class="header_input">
		Edit Driver
	</div>
	<div class="box-input">
		<form action="edit_aksi.php" method="POST" enctype="multipart/form-data">
		<?php 
		require_once '../../dbConnect.php';
		$id_driver=$_GET['id_driver'];
		$query=mysqli_query($conn,"SELECT * FROM driver WHERE id_driver='$id_driver'");

		while($row=mysqli_fetch_array($query)){
			$nama=$row['nama_driver'];
			$nohp=$row['no_hp'];
			$username=$row['username'];
			$password=$row['password'];
		}
		?>

			<label for="id_driver">ID Driver :</label>
			<input type="text" name="txtidriver" class="input" readonly placeholder="id driver ........" autocomplete="off" value="<?php echo $id_driver;?>">	
			<label for="namadriver">Nama User :</label>
			<input type="text" name="txtnama" class="input" placeholder="nama driver ........" autocomplete="off" value="<?php echo $nama;?>">
			<label for="no_hp">No. Handphone :</label>
			<input type="text" name="txtnohp" class="input" autocomplete="off" placeholder="No. Handphone driver......." value="<?php echo $nohp;?>">
			<label for="username">Username :</label>
			<input type="text" name="txtusername" class="input" autocomplete="off" placeholder="username......." value="<?php echo $username;?>">
			<label for="password">Password :</label>
			<input type="password" name="txtpassword" class="input" autocomplete="off" placeholder="Password driver......." value="<?php echo $password;?>">
			<input type="submit" name="btnsimpan" class="submit" value="SIMPAN">
		
		</form>
	</div>
</div>
</div>
</body>
</html>
<?php

}


?>
