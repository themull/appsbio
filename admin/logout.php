<?php
session_start();
session_destroy();
 echo '<script language="javascript">  
 alert("Selamat Tinggal, nanti kembali lagi yahhhhhhh");  
 window.location="index.php";  
 </script>';  
 exit();  

?>