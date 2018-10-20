<?php
include_once 'db_connection.php';
include 'models/users.php';

if (!empty($_POST['login'])	&& !empty($_POST['passwd']))
{
	if (create_user($_POST['login'], $_POST['passwd']))
	{
		echo "User created!\n";
		if ($_GET[redirect_to] != '')
			header('Location: '.$_GET[redirect_to]);
		else
			header('Location: landing_page.php');
	}
	else
		header('Location: register.php?error=User already exists');
}
else
{
	include 'html/menu.php';
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="style/landing_page.css">
		<title>winter hiking</title>
	</HEAD>
	<BODY>


<?php
if (!empty($_GET['error']))
	echo "<div class='alert alert-danger'role='alert'>Error: ".$_GET['error']."</div>\n";
?>

<div class="row" align="center">
<br>
<h3> Register </h3>
	<form method="post" action="register.php?redirect_to=landing_page.php">
		Username <input type="text" name="login"/>
		<br />
		Password <input type="password" name="passwd"/>
		<br>
		<input type="submit" name="submit" value="Register"/>
	</form>
</div>


<?php
}


?>

	</BODY>
</HTML>
