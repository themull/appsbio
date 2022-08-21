<?php

session_start();
if (empty($_SESSION['username'])) {
  echo "<center>Untuk mengakses halaman ini, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else {
?>

<html>
<head>
	<title>Admin Aplikasi Biomagg</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="assets/fontawesome-free-5.11.2-web/css/fontawesome.css" rel="stylesheet">
 	<link href="assets/fontawesome-free-5.11.2-web/css/brands.css" rel="stylesheet">
 	<link href="assets/fontawesome-free-5.11.2-web/css/solid.css" rel="stylesheet">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<div class="header">
		<div class="logo"><a href="beranda.php"><span>Aplikasi</span>Biomagg</a></div>
	</div>

	<div class="container">
		<div class="sidebar">
			<ul id ="nav">
				<li><a href="beranda.php" class="selected"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
				<li><a href="user/data_user.php"><i class="fab fa-android"></i>Data User</a></li>
				<li><a href="driver/data_driver.php"><i class="fa fa-user"></i>Data Driver</a></li>
				<li><a href="jemput/data_jemput.php"><i class="fa fa-truck"></i>Data Jemput</a></li>
				<li><a href="jadwal/jadwal_pelatihan.php"><i class="fa fa-chalkboard-teacher"></i>Jadwal Pelatihan</a></li>
				<li><a href="pelatihan/data_pelatihan.php"><i class="fa fa-user-graduate"></i>Data Pelatihan</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

			</ul>
		</div>
		
		<?php
		require_once '../dbConnect.php';
		 $sqluser= mysqli_query($conn,"SELECT count(*) AS id_user FROM user") or die(mysql_error());
		 $user = mysqli_fetch_array($sqluser);

		 $sqldriver= mysqli_query($conn,"SELECT count(*) AS id_driver FROM driver") or die(mysql_error());
		 $driver = mysqli_fetch_array($sqldriver);

		 $sqljemput= mysqli_query($conn,"SELECT count(*) AS id_jemput FROM jemput") or die(mysql_error());
		 $jemput = mysqli_fetch_array($sqljemput);

		 $sqljadwal= mysqli_query($conn,"SELECT count(*) AS id_jadwal FROM jadwal") or die(mysql_error());
		 $jadwal = mysqli_fetch_array($sqljadwal);

		 $sqlpelatihan= mysqli_query($conn,"SELECT count(*) AS id_pelatihan FROM pelatihan") or die(mysql_error());
		 $pelatihan = mysqli_fetch_array($sqlpelatihan);	

		?>
		<div class="content">
			<h1>BERANDA</h1>
			<p>Aplikasi penjemputan Dan pelatihan sampah Oleh PT. Biomagg Indonesia</p>
			
				<div id="box">
				<div class="box-top">Jumlah Data</div>
				<div class="box-panel">
					Data User : <?php echo "{$user['id_user']}";?>
				</div>
				<div class="box-panel">
					Data Driver : <?php echo "{$driver['id_driver']}";?>
				</div>
				<div class="box-panel">
					Data jemput : <?php echo "{$jemput['id_jemput']}";?>
				</div>
				<div class="box-panel">
					Data Jadwal : <?php echo "{$jadwal['id_jadwal']}";?>
				</div>
				<div class="box-panel">
					Data pelatihan : <?php echo "{$pelatihan['id_pelatihan']}";?>
				</div>
			</div>

			

		</div>
	</div>	
</body>
</html>
<?php 
}

?>
