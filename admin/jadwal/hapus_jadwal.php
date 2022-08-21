 <?php ob_start();
require_once '../../dbConnect.php';
 mysqli_query($conn,"DELETE FROM jadwal WHERE id_jadwal='$_GET[id_jadwal]'");
{
			echo '<script language="javascript">
				  alert ("Data jadwal Berhasil Dihapus");
				  window.location="jadwal_pelatihan.php";
				  </script>';
				  exit();
	}
?>