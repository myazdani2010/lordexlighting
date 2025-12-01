<?php

$hostname = '162.241.217.78';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$dbname   = 'lordexli_DL'; // Your database name.
$username = 'lordexli_web';             // Your database username.
$password = 'z#5i@ot0Odr2b2mo6Ox=';                 // Your database password. If your database has no password, leave it empty.

// Let's connect to host
$conn = mysqli_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
// Select the database
mysqli_select_db($conn, $dbname) or DIE('Database name is not available!');

$mysqli = new mysqli($hostname, $username, $password, $dbname);

?>
