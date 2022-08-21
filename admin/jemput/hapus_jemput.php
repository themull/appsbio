 <?php ob_start();
require_once '../../dbConnect.php';
 mysqli_query($conn,"DELETE FROM jemput WHERE id_jemput='$_GET[id_jemput]'");
{
			echo '<script language="javascript">
				  alert ("Data Jemput Berhasil Dihapus");
				  window.location="data_jemput.php";
				  </script>';
				  exit();
	}
?>