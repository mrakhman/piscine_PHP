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
include_once 'db_connection.php';
include 'models/users.php';

	session_start();
	if ($_POST[login] != '' && $_POST[passwd] != '')
	{
		$user = get_user($_POST[login]);
		if (auth_user($user, $_POST[passwd]))
		{
			$_SESSION[user] = $user;
			echo "<h3 align='center'> User logged in </h3>\n";
		}
		else
		{
			$_SESSION[user] = "";
			echo "<h3 align='center'> Error </h3>\n";
		}
	}
	else
		echo "<h3 align='center'> Error </h3>\n";
?>

	</BODY>
</HTML>