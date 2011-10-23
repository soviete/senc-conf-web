<?php # Script 16.4 - mysqli_connect.php

// This file contains the database access information.
// This file also establishes a connection to MySQL
// and selects the database.

// Set the database access information as constants:
DEFINE ('DB_USER', 'gestor_formul');
DEFINE ('DB_PASSWORD', '1q2w3e4r');
DEFINE ('DB_HOST', 'conferencias.senc.es');
DEFINE ('DB_NAME', 'formulario');


// Make the connection:
//$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$connection = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
$db = mysql_select_db(DB_NAME,$connection);
mysql_query("SET NAMES 'utf8'");
// NO USAR, usar una query antes de cada query para cambiar el charset de la base de datos:
#$charset = mysql_set_charset('utf8',$connection);
#$charset = mysql_client_encoding($connection);
if (!$connection) {
	trigger_error ('Could not connect to MySQL: ' . mysql_connect_error() );
}
?>