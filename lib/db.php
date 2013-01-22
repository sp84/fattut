<?php 
$dbhost = 'localhost';
$dbname = 'fattut';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname, $conn);
?>