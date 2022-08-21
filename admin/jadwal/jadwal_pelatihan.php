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
                <li><a href="../jemput/data_jemput.php"><i class="fa fa-truck"></i>Data Jemput</a></li>
                <li><a href="jadwal_pelatihan.php" class="selected"><i class="fa fa-chalkboard-teacher"></i>Jadwal Pelatihan</a></li>
                <li><a href="../pelatihan/data_pelatihan.php"><i class="fa fa-user-graduate"></i>Data Pelatihan</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

			</ul>
		</div>

<div class="content">
<div class="form_input">
	<div class="header_input">
		<h1 align="center">JADWAL PELATIHAN</h1>
	</div>
	<div class="box-data">
		<form action="tambah_jadwal.php" method="POST" enctype="multipart/form-data">
		 <input type="submit" class="btn-tambah" value="Tambah Jadwal"  />
         <table class="tabel-data" >
        <tr bgcolor="#90EE90">
        <th><div align="center"><strong>No</strong></div></th>
        <th><div align="center"><strong>id Jadwal</strong></div></th>
        <th><div align="center"><strong>Tanggal</strong></div></th>
        <th><div align="center"><strong>Waktu</strong></div></th>
        <th><div align="center"><strong>Kegiatan</strong></div></th>
        <th><div align="center"><strong>Deskripsi</strong></div></th>
        <th><div align="center"><strong>Harga</strong></div></th>
        <th colspan="2"><div align="center"><strong>Aksi</strong></div></th>
        </tr>
            <?php
            require_once '../../dbConnect.php';
            $batas = 7;
            $pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
             
            if ( empty( $pg ) ) {
            $posisi = 0;
            $pg = 1;
            } else {
            $posisi = ( $pg - 1 ) * $batas;
            }   
            $no=0+$posisi;
              $tampil="SELECT * FROM jadwal order by jadwal_tanggal desc limit $posisi, $batas";
              $qryTampil=mysqli_query($conn,$tampil);
              if ($qryTampil === FALSE) {
                    die(mysqli_error());
                }
              while ($dataTampil=mysqli_fetch_array($qryTampil)) {
             $no++;

            $tgl=date('d F Y', strtotime($dataTampil['jadwal_tanggal']));
            $waktu=date('H:i', strtotime($dataTampil['jadwal_waktu']));
            $harga="Rp " . number_format($dataTampil['harga'],0,',','.');
             ?>
             
            <tr bgcolor="#FFFFFF">
            <td align="center" data-label="no"><?php echo $no ; ?></td>
            <td align="center" data-label="id jadwal"><?php echo $dataTampil['id_jadwal']; ?></td>
            <td align="center" data-label="tanggal"><?php echo $tgl; ?></td>
            <td align="center" data-label="waktu"><?php echo $waktu; ?></td>
            <td align="center" data-label="kegiatan"><?php echo $dataTampil['jadwal_kegiatan']; ?></td>
            <td align="center" data-label="deskripsi"><?php echo $dataTampil['deskripsi']; ?></td>
            <td align="center" data-label="harga"><?php echo $harga;?></td>
            <td>
            <div align="center">
            <a href="edit_jadwal.php?id_jadwal=<?php echo $dataTampil['id_jadwal']; ?> "class="Edit"><i class="fas fa-edit"></i>Edit</a>
            </div>
            </td>
            <td>
            <div align="center">
            <a href="hapus_jadwal.php?id_jadwal=<?php echo $dataTampil['id_jadwal'] ; ?>" class="delete" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fas fa-trash-alt"></i>hapus</a>
            </div>
            </td>
            </tr>
            <?php } ?>
            
            <tr bgcolor="#FFFFFF">
            <td colspan="11">
            <?php
            //hitung jumlah data
            $jml_data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM jadwal"));
            //Jumlah halaman
            $JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
            if ( $pg > 1 ) {
            $link = $pg-1;
            $prev = "<a href='?pg=$link'>Sebelumnya </a>";
            } else {
            $prev = "Sebelumnya ";
            }
            
            $nmr = '';
            for ( $i = 1; $i<= $JmlHalaman; $i++ ){
             
            if ( $i == $pg ) {
            $nmr .= $i . " ";
            } else {
            $nmr .= "<a href='?pg=$i'>$i</a> ";
            }
            }
            
            if ( $pg < $JmlHalaman ) {
            $link = $pg + 1;
            $next = " <a href='?pg=$link'>Selanjutnya</a>";
            } else {
            $next = "Selanjutnya";
            }
            
            echo $prev . $nmr . $next;
             ?>
             </td>
             </tr>
        </table>
		</form>
	</div>
</div>
</div>
</body>
</html>
<?php
}
?>
