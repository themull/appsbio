 <?php ob_start();
require_once '../../dbConnect.php';
 mysqli_query($conn,"DELETE FROM driver WHERE id_driver='$_GET[id_driver]'");
{
			echo '<script language="javascript">
				  alert ("Data Driver Berhasil Dihapus");
				  window.location="data_driver.php";
				  </script>';
				  exit();
	}
?>