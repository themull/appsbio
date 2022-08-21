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
		<h1 align="center">DATA USER</h1>

	</div>
	<div class="box-data">
		<form action="tambah_user.php" method="POST" enctype="multipart/form-data">
		<input type="submit" class="btn-tambah" value="Tambah User"  />
		 <table class="tabel-data-banyak" >
        <tr bgcolor="#90EE90">
        <th><div align="center"><strong>No</strong></div></th>
        <th><div align="center"><strong>Nama User</strong></div></th>
        <th><div align="center"><strong>Email</strong></div></th>
        <th><div align="center"><strong>Nomor HP</strong></div></th>
        <th colspan="2"><div align="center"><strong>Aksi</strong></div></th>
        </tr>
            <?php
            require_once '../../dbConnect.php';
            $batas = 5;
            $pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
             
            if ( empty( $pg ) ) {
            $posisi = 0;
            $pg = 1;
            } else {
            $posisi = ( $pg - 1 ) * $batas;
            }   
            $no=0+$posisi;
              $tampil="SELECT * FROM user limit $posisi, $batas";
              $qryTampil=mysqli_query($conn,$tampil);
              if ($qryTampil === FALSE) {
                    die(mysqli_error());
                }
              while ($dataTampil=mysqli_fetch_array($qryTampil)) {
             $no++;
             ?>
             
            <tr bgcolor="#FFFFFF">
            <td align="center" data-label="no"><?php echo $no ; ?></td>
            <td align="center" data-label="nama"><?php echo $dataTampil['nama']; ?></td>
            <td align="center" data-label="email"><?php echo $dataTampil['email']; ?></td>
            <td align="center" data-label="no hp"><?php echo $dataTampil['no_hp']; ?></td>
            <td>
            <div align="center">
            <a href="edit_user.php?id_user=<?php echo $dataTampil['id_user']; ?> "class="Edit"><i class="fas fa-edit"></i>Edit</a>
            </div>
            </td>
            <td>
            <div align="center">
            <a href="hapus_user.php?id_user=<?php echo $dataTampil['id_user'] ; ?>" class="delete" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fas fa-trash-alt"></i>hapus</a>
            </div>
            </td>
            </tr>
            <?php } ?>
            
            <tr bgcolor="#FFFFFF">
            <td colspan="11">
            <?php
            //hitung jumlah data
            $jml_data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user"));
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
