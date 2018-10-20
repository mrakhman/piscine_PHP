<?PHP
	$cookie_name = $_GET["name"];
	if ($_GET["action"] == "set")
	{
		$cookie_value = $_GET["value"];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}
	else if ($_GET["action"] == "get")
	{
		echo $_COOKIE[$cookie_name];
	}
	else if ($_GET["action"] == "del")
	{
		setcookie($cookie_name, "", time() - 1, "/");
	}
?>
