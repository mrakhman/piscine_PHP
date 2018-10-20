<!DOCTYPE html>
<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="style/landing_page.css">
		<title>winter hiking</title>
	</HEAD>
	<BODY>
	<?php
		include 'html/menu.php';
		include 'my_account.html';
		include 'html/landing_page.html';
		include "func_fill_with_items.php";
		echo "<section>";
			if (!empty($_GET['category_id']))
				fill_with_items(1, [(int)$_GET['category_id']]);
			else
				fill_with_items(1, NULL);
		echo "</section>";
	?>

	</BODY>
</HTML>
