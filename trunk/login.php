<?php
include 'mysql_connect.php';
//session_start();
if ($_POST['user'] and $_POST['pass']) {
	$rs = mysql_query( "SELECT idAdmin FROM ADMIN WHERE idAdmin = '".$_POST['user']."'" ) or mysql_error();
        //echo "Printa ---> $rs";
	if (! mysql_num_rows( $rs ) ) {
		$_SESSION['error'] = 'L\'usuari introduït no es vàlid.';
		include 'error_login_1.php';
	} else {
		$rs = mysql_query( "SELECT cosa, idAdmin FROM ADMIN WHERE idAdmin = '".$_POST['user']."'" ) or mysql_error();
		$rsF = mysql_fetch_array( $rs );
                $cosa = $_POST['pass'];
                $cosa = MD5 ($cosa);
            
                if ($rsF[0] != $cosa) {
			$_SESSION['error'] = "La contrasenya introduïda no és vàlida.";
			include 'error_login_1.php';
		} else {
			$_SESSION['valid'] = 'YES';
			$_SESSION['Name'] = $rsF[1];
			header ('Location:admin.php');
		}
	}
} else {
	$_SESSION['error'] = 'Heu d\'emplenar tant el nom d\'usuari com la contrasenya.';
	include 'error_login_1.php';
}
?>