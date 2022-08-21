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
				<li><a href="data_user.php" class="selected"><i class="fab fa-android"></i>Data User</a></li>
				<li><a href="../driver/data_driver.php"><i class="fa fa-user"></i>Data Driver</a></li>
				<li><a href="../jemput/data_jemput.php"><i class="fa fa-truck"></i>Data Jemput</a></li>
				<li><a href="../jadwal/jadwal_pelatihan.php"><i class="fa fa-chalkboard-teacher"></i>Jadwal Pelatihan</a></li>
				<li><a href="../pelatihan/data_pelatihan.php"><i class="fa fa-user-graduate"></i>Data Pelatihan</a></li>
				<li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

			</ul>
		</div>

<div class="content">
<div class="form_input">
	<div class="header_input">
		Edit User
	</div>
	<div class="box-input">
		<form action="edit_aksi.php" method="POST" enctype="multipart/form-data">
		<?php 
		require_once '../../dbConnect.php';
		$id_user=$_GET['id_user'];
		$query=mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id_user'");

		while($row=mysqli_fetch_array($query)){
			$nama=$row['nama'];
			$email=$row['email'];
			$nohp=$row['no_hp'];
			$alamat=$row['alamat'];
			$password=$row['password'];
		}
		?>

			<label for="iduser">ID User :</label>
			<input type="text" name="txtiduser" class="input" readonly placeholder="nama user ........" autocomplete="off" value="<?php echo $id_user;?>">	
			<label for="namabunga">Nama User :</label>
			<input type="text" name="txtnama" class="input" placeholder="nama user ........" autocomplete="off" value="<?php echo $nama;?>">
			<label for="email">Email :</label>
			<input type="text" name="txtemail" class="input" placeholder="Email User......" autocomplete="off" value="<?php echo $email;?>"></label>
			<label for="no_hp">No. Handphone :</label>
			<input type="text" name="txtnohp" class="input" autocomplete="off" placeholder="No. Handphone user......." value="<?php echo $nohp;?>">
			<label for="alamat">Alamat :</label>
			<textarea name="txtalamat" id="txtalamat" class="input"  placeholder="Alamat....."><?php echo $alamat?></textarea>
			<label for="password">Password :</label>
			<input type="password" name="txtpassword" class="input" autocomplete="off" placeholder="password user......." value="<?php echo $nohp;?>">
			<input type="submit" name="btnsimpan" class="submit" value="SIMPAN">
		
		</form>
	</div>
</div>
</div>
</body>
</html>
<?php } ?>
