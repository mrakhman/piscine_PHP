<!DOCTYPE html>
<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="style/landing_page.css">
		<title>winter hiking</title>
	</HEAD>
	<BODY>

<?php
include 'html/menu.php';
?>

<?PHP
	
	session_start();
	$_SESSION[user] = "";
	echo "<h3 align='center'> User logged out </h3>\n"
?>

	</BODY>
</HTML>