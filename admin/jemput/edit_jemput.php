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
				<li><a href="../user/data_user.php" ><i class="fab fa-android"></i>Data User</a></li>
				<li><a href="../driver/data_driver.php"><i class="fa fa-user"></i>Data Driver</a></li>
				<li><a href="data_jemput.php" class="selected"><i class="fa fa-truck"></i>Data Jemput</a></li>
				<li><a href="../jadwal/jadwal_pelatihan.php"><i class="fa fa-chalkboard-teacher"></i>Jadwal Pelatihan</a></li>
				<li><a href="../pelatihan/data_pelatihan.php"><i class="fa fa-user-graduate"></i>Data Pelatihan</a></li>
				<li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

			</ul>
		</div>

<div class="content">
<div class="form_input">
	<div class="header_input">
		Edit Jemput
	</div>
	<div class="box-input">
		<form action="edit_aksi.php" method="POST" enctype="multipart/form-data">
		<?php 
		require_once '../../dbConnect.php';
		$id_jemput=$_GET['id_jemput'];
		$query=mysqli_query($conn,"SELECT * FROM jemput WHERE id_jemput='$id_jemput'");

		while($row=mysqli_fetch_array($query)){
			
			$tempat=$row['jemput_tempat'];
			$ukuran=$row['ukuran'];
			$keterangan=$row['keterangan'];
			$id_user=$row['id_user'];
			$status=$row['status'];
			$id_driver=$row['id_driver'];
			$waktu_ambil=$row['waktu_selesai'];


 	$tgl=date('d F Y', strtotime($row['jemput_tanggal']));
 	$row['jadwal_tanggal']=$tgl;

 	$waktu=date('H:i', strtotime($row['jemput_waktu']));
 	$row['jadwal_waktu']=$waktu;

 	$harga="Rp " . number_format($row['harga'],0,',','.');
 	$row['harga']=$harga;
		}
		?>

			<label for="idjemput">ID Jemput :</label>
			<input type="text" name="txtidjemput" class="input" readonly placeholder="id jemput ........" autocomplete="off" value="<?php echo $id_jemput;?>">	
			<label for="tanggal">Tanggal Jemput :</label>
			<input type="text" name="txttgl" class="input" readonly placeholder="tanggal jemput ........" autocomplete="off" value="<?php echo $tgl;?>">
			<label for="waktu">Waktu Jemput :</label>
			<input type="text" name="txtwaktu" class="input" readonly placeholder="waktu jemput......" autocomplete="off" value="<?php echo $waktu;?>"></label>
			<label for="tempat">Tempat Jemput :</label>
			<input type="text" name="txttempat" class="input" readonly autocomplete="off" placeholder="No. Handphone user......." value="<?php echo $tempat;?>">
			<label for="ukuran">Ukuran Sampah :</label>
			<input type="text" name="txtukuran" class="input" readonly autocomplete="off" placeholder="ukuran ......."value="<?php echo $ukuran;?>">
			<label for="keterangan">Keterangan Sampah :</label>
			<input type="text" name="txtket" class="input" readonly placeholder="keterangan ........" autocomplete="off" value="<?php echo $keterangan;?>">
			<label for="harga">Harga :</label>
			<input type="text" name="txtharga" class="input" readonly placeholder="harga ........" autocomplete="off" value="<?php echo $harga;?>">
			<label for="iduser">ID User :</label>
			<input type="text" name="txtiduser" class="input" readonly placeholder="id user ........" autocomplete="off" value="<?php echo $id_user;?>">
			<label for="status">Status :</label>
			<select name="cmbstatus" class="input">
				<option value="">- Status -</option>
				<?php
					$pilihan = array("1" => "Orderan", "2" => "Proses", "3" => "Selesai","4" => "Cancel");
					foreach ($pilihan as $nilai => $inisial) {
						if($nilai == $status) {
							$cek = "selected";
						}
						else {
							$cek = "";
						}
					 	echo"<option value='$nilai' $cek> $nilai - $inisial</option>";
					 } 
				?>
			</select>
			<label for="iduser">ID Driver :</label>
			<input type="text" name="txtiddriver" class="input" placeholder="id driver ........" autocomplete="off" value="<?php echo $id_driver;?>">
			<label for="iduser">Waktu Ambil :</label>
			<input type="text" name="txtwaktuambil" class="input" placeholder="id user ........" autocomplete="off" value="<?php echo $waktu_ambil;?>">
			<input type="submit" name="btnsimpan" class="submit" value="SIMPAN">
		
		</form>
	</div>
</div>
</div>
</body>
</html>
<?php } ?>
