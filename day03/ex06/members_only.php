<?PHP
	if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")
	{
		$file = file_get_contents("../img/42.png");
		$file_data = base64_encode($file);
		echo "<html><body>\n";
		echo "Hello Zaz<br />\n";
		echo "<img src='data:image/png;base64,$file_data'>\n";
		echo "</body></html>\n";
	}
	else
	{
		echo "<html><body>That area is accessible for members only</body></html>\n";
		header("HTTP/1.0 401 Unauthorized");
		header("WWW-Authenticate: Basic realm='Member area'");
	}
?>
