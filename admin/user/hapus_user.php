 <?php ob_start();
require_once '../../dbConnect.php';
 mysqli_query($conn,"DELETE FROM user WHERE id_user='$_GET[id_user]'");
{
			echo '<script language="javascript">
				  alert ("Data User Berhasil Dihapus");
				  window.location="data_user.php";
				  </script>';
				  exit();
	}
?>