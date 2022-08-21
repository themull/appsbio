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
 	<link rel="stylesheet" href="../assets/jquery/jquery-ui.css" type="text/css">
 	<script src="../assets/jquery/jquery-3.0.0.min.js" type="text/javascript"></script>
	<script src="../assets/jquery/jquery-ui.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<script>
$(function() {
    $( "#txttanggal" ).datepicker({
	minDate:"0",
	dateFormat: "yy-mm-dd",
	changeMonth: true,
	changeYear: true,	
	yearRange: "-116:"
	});
});

</script>
</head>

<body>

	
	<div class="header">
		<div class="logo"><a href="../beranda.php"><span>Aplikasi</span>Biomagg</a></div>
	</div>

	<div class="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a href="../beranda.php" ><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
				<li><a href="../user/data_user.php" ><i class="fab fa-android"></i>Data User</a></li>
				<li><a href="../driver/data_driver.php"><i class="fa fa-user"></i>Data Driver</a></li>
				<li><a href="../jemput/data_jemput.php"><i class="fa fa-truck"></i>Data Jemput</a></li>
				<li><a href="jadwal_pelatihan.php" class="selected"><i class="fa fa-chalkboard-teacher"></i>Jadwal Pelatihan</a></li>
				<li><a href="../pelatihan/data_pelatihan.php"><i class="fa fa-user-graduate"></i>Data Pelatihan</a></li>
				<li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

			</ul>
		</div>

<div class="content">
<div class="form_input">
	<div class="header_input">
		Form Tambah Jadwal
	</div>
	<div class="box-input">
		<form action="tambah_aksi.php" method="POST" enctype="multipart/form-data">
			<label for="txttanggal">Tanggal kegiatan :</label>
			<input type="text" name="txttanggal" id="txttanggal" class="input" placeholder="Tanggal kegiatan ........" autocomplete="off">
			<div>&nbsp;</div>
			<label>Waktu kegiatan :</label><br>
			<div>&nbsp;</div>
			<label>Jam Kegiatan :</label>
				<select name="cmbjam" class="inputjadwal">
				<option value="">- Jam -</option>
				<?php
					for ($i=0; $i <= 24 ; $i++) { 
						echo "<option>$i</option>";
					}
				?>

			</select><br>
			<label >Menit Kegiatan :</label>
				<select name="cmbmenit" class="inputjadwal">
				<option value="">- Menit -</option>
				<?php
					for ($i=0; $i <=59 ; $i++){
						echo "<option>$i</option>";
					}
				?>
			</select><br>
			<label for="kegiatan">Kegiatan Pelatihan :</label>
			<input type="text" name="txtkegiatan" class="input" autocomplete="off" placeholder="Kegiatan Pelatihan.......">
			<label for="deskripsi">Deskripsi :</label>
			<textarea name="txtdeskripsi" id="txtdeskripsi" class="input" placeholder="Deskripsi....."></textarea>
			<label for="harga">Harga :</label>
			<input type="text" name="txtharga" class="input" autocomplete="off" placeholder="Harga.......">
			<input type="submit" name="btnsimpan" class="submit" value="SIMPAN">
		
		</form>
	</div>
</div>
</body>
</html>
<?php 
}
?>
