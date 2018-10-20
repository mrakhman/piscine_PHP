<?PHP
	session_start();
	if ($_SESSION[user] != '')
	{
		header("Content-Type: text/plain");
		print_r($_SESSION[user]);
	}
	else
		echo "ERROR\n";

?>
