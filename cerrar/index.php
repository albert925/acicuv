<?php
	session_start();
	unset($_SESSION['adm']);
	$_SESSION=array();
	session_destroy();
	echo "<script type='text/javascript'>";
		echo "var pagina='../aciadm';";
		echo "document.location.href=pagina;";
	echo "</script>";
?>