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
		<h1 align="center">DATA JEMPUT</h1>
	</div>
	<div class="box-data">
		<form action="#" >
		 <table class="tabel-data" >
        <tr bgcolor="#90EE90">
        <th><div align="center"><strong>No</strong></div></th>
        <th><div align="center"><strong>ID Jemput</strong></div></th>
        <th><div align="center"><strong>Tanggal Order</strong></div></th>
        <th><div align="center"><strong>Waktu Order</strong></div></th>
        <th><div align="center"><strong>Lokasi Order</strong></div></th>
        <th><div align="center"><strong>Ukuran</strong></div></th>
        <th><div align="center"><strong>Keterangan</strong></div></th>
        <th><div align="center"><strong>Harga</strong></div></th>
        <th><div align="center"><strong>ID User</strong></div></th>
        <th><div align="center"><strong>Status</strong></div></th>
        <th><div align="center"><strong>ID Driver</strong></div></th>
        <th><div align="center"><strong>Waktu Di Ambil</strong></div></th>
        <th colspan="2"><div align="center"><strong>Aksi</strong></div></th>
        </tr>
            <?php
            require_once '../../dbConnect.php';
            $batas = 10;
            $pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
             
            if ( empty( $pg ) ) {
            $posisi = 0;
            $pg = 1;
            } else {
            $posisi = ( $pg - 1 ) * $batas;
            }   
            $no=0+$posisi;
              $tampil="SELECT * FROM jemput ORDER BY status limit $posisi, $batas ";
              $qryTampil=mysqli_query($conn,$tampil);
              if ($qryTampil === FALSE) {
                    die(mysqli_error());
                }
              while ($dataTampil=mysqli_fetch_array($qryTampil)) {
             $no++;


             switch ($dataTampil['status']) {
                case '1':
                    $bg="#F08080";
                    $o="Order";
                    break;
                case '2':
                    $bg="yellow";
                    $o="Proses";
                    break;
                case '3':
                    $bg="#6495ED";
                    $o="Selesai";
                    break;
                case '4':
                    $bg="white";
                    $o="Cancel";
                    break;
                default:
                    $bg="black";
                    break;
            }

            $tgl=date('d F Y', strtotime($dataTampil['jemput_tanggal']));
            $waktu=date('H:i', strtotime($dataTampil['jemput_waktu']));
            $waktuend=date('H:i', strtotime($dataTampil['waktu_selesai']));
            $harga="Rp " . number_format($dataTampil['harga'],0,',','.');
             ?>
             
            <tr bgcolor="#FFFFFF">
            <td align="center" data-label="no"><?php echo $no ; ?></td>
            <td align="center" data-label="id jemput"><?php echo $dataTampil['id_jemput']; ?></td>
            <td align="center" data-label="tanggal"><?php echo $tgl;?></td>
            <td align="center" data-label="waktu"><?php echo $waktu; ?></td>
            <td align="left" data-label="lokasi"><?php echo $dataTampil['jemput_tempat']; ?></td>
            <td align="center" data-label="ukuran"><?php echo $dataTampil['ukuran']; ?></td>
            <td align="center" data-label="keterangan"><?php echo $dataTampil['keterangan']; ?></td>
            <td align="center" data-label="harga"><?php echo $harga; ?></td>
            <td align="center" data-label="id user"><?php echo $dataTampil['id_user']; ?></td>
            <td align="center" bgcolor="<?= $bg; ?>" data-label="status"><?php echo $o; ?></td>
            <td align="center" data-label="id driver"><?php echo $dataTampil['id_driver']; ?></td>
            <td align="center" data-label="Waktu Ambil"><?php echo $waktuend; ?></td>
            <td>
            <div align="center">
            <a href="edit_jemput.php?id_jemput=<?php echo $dataTampil['id_jemput']; ?> "class="Edit"><i class="fas fa-edit"></i>Edit</a>
            </div>
            </td>
            <td>
            <div align="center">
            <a href="hapus_jemput.php?id_jemput=<?php echo $dataTampil['id_jemput'] ; ?>" class="delete" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fas fa-trash-alt"></i>hapus</a>
            </div>
            </td>
            </tr>
            <?php } ?>
            
            <tr bgcolor="#FFFFFF">
            <td colspan="14">
            <?php
            //hitung jumlah data
            $jml_data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM jemput ORDER BY status asc"));
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
<?php } ?>
