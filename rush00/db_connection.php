<?php

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPasswd = '123456';
$dbName = "rush00";

$mysqli = new mysqli($dbServername, $dbUsername, $dbPasswd, $dbName);

if ($mysqli->connect_errno)
{
	echo "Connection failed: (" . $mysqli->connect_error . ") ";
}

?>
