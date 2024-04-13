<?php
//constants to hold connection parameters
define ('DB_USER', 'root');
define ('DB_PASSWORD', 'onuorah12');
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'BGdb');

// mysqli_connect function is used to connect to the database
$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>