 <?php ob_start();
require_once '../../dbConnect.php';
 mysqli_query($conn,"DELETE FROM pelatihan WHERE id_pelatihan='$_GET[id_pelatihan]'");
{
			echo '<script language="javascript">
				  alert ("Data Pelatihan Berhasil Dihapus");
				  window.location="data_pelatihan.php";
				  </script>';
				  exit();
	}
?>