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
				<li><a href="../jemput/data_jemput.php" ><i class="fa fa-truck"></i>Data Jemput</a></li>
				<li><a href="../jadwal/jadwal_pelatihan.php"><i class="fa fa-chalkboard-teacher"></i>Jadwal Pelatihan</a></li>
				<li><a href="data_pelatihan.php" class="selected"><i class="fa fa-user-graduate"></i>Data Pelatihan</a></li>
				<li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
			</ul>
		</div>

<div class="content">
<div class="form_input">
	<div class="header_input">
		Edit Pelatihan
	</div>
	<div class="box-input">
		<form action="edit_aksi.php" method="POST" enctype="multipart/form-data">
		<?php 
		require_once '../../dbConnect.php';
		$id_pelatihan=$_GET['id_pelatihan'];
		$query=mysqli_query($conn,"SELECT * FROM pelatihan WHERE id_pelatihan='$id_pelatihan'");

		while($row=mysqli_fetch_array($query)){
			
			$keg=$row['pelatihan_kegiatan'];
			$des=$row['deskripsi'];
			$id_user=$row['id_user'];
			$status=$row['status'];


 	$tgl=date('d F Y', strtotime($row['pelatihan_tanggal']));
 	$row['jadwal_tanggal']=$tgl;

 	$waktu=date('H:i', strtotime($row['pelatihan_waktu']));
 	$row['jadwal_waktu']=$waktu;


 	$harga="Rp " . number_format($row['harga'],0,',','.');
 	$row['harga']=$harga;
		}
		?>

			<label for="idpelatihan">ID Pelatihan :</label>
			<input type="text" name="txtidpelatihan" class="input" readonly autocomplete="off" value="<?php echo $id_pelatihan;?>">	
			<label for="tanggal">Tanggal Pelatihan :</label>
			<input type="text" name="txttgl" class="input" readonly  autocomplete="off" value="<?php echo $tgl;?>">
			<label for="waktu">Waktu Pelatihan :</label>
			<input type="text" name="txtwaktu" class="input" readonly  autocomplete="off" value="<?php echo $waktu;?>"></label>
			<label for="keg">Kegiatan :</label>
			<input type="text" name="txtkeg" class="input" readonly autocomplete="off" value="<?php echo $keg;?>">
			<label for="deskripsi">Deskripsi :</label>
			<textarea name="txtdeskripsi" id="txtdeskripsi" class="input" readonly ><?php echo $des?></textarea>
			<label for="harga">Harga :</label>
			<input type="text" name="txtharga" class="input" readonly autocomplete="off" value="<?php echo $harga;?>">
			<label for="iduser">ID User :</label>
			<input type="text" name="txtiduser" class="input" readonly  autocomplete="off" value="<?php echo $id_user;?>">
			<label for="status">Status :</label>
			<select name="cmbstatus" class="input">
				<option value="">- Status -</option>
				<?php
					$pilihan = array("1" => "Daftar","2" => "Mengikuti Pelatihan", "3" => " Tidak Mengikuti Pelatihan");
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
			<input type="submit" name="btnsimpan" class="submit" value="SIMPAN">
		
		</form>
	</div>
</div>
</div>
</body>
</html>
<?php } ?>
