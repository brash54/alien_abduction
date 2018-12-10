<?php # Script 18.4 - mysqli_connect.php
// This file contains the database access information.
// This file also establishes a connection to MySQL
// and selects the database.

// Set the database access information as constants:
define('DB_USER', 'rashton');
define('DB_PASSWORD', 'nuPot83');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ch18');
//dccc.tech credentials
//define('DB_USER', 'P00633966');
//define('DB_PASSWORD', 'Poo633966#');
//define('DB_HOST', 'localhost');
//define('DB_NAME', 'P00633966');



// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// If no connection could be made, trigger an error:
if (!$dbc) {
	trigger_error('Could not connect to MySQL: ' . mysqli_connect_error() );
} else { // Otherwise, set the encoding:
	mysqli_set_charset($dbc, 'utf8');
}