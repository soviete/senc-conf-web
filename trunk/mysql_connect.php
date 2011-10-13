<?php # Script 16.4 - mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.

// Set the database access information as constants:
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'admin');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'SENCCONF');

// Make the connection:
//$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$connection = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
$db = mysql_select_db(DB_NAME,$connection);
if (!$connection) {
	trigger_error ('Could not connect to MySQL: ' . mysql_connect_error() );
}
?>
