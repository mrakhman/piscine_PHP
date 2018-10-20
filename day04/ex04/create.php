<?PHP
if ($_POST[login] != '' && $_POST[passwd] != '' && $_POST[submit] === "OK")
{
	if(!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/passwd"))
		$array = array();
	else
		$array = unserialize(file_get_contents("../private/passwd"));
	$marker = 0;
	foreach ($array as $key => $value)
	{
		if ($_POST[login] === $value[login])
			$marker = 1;
	}
	if ($marker === 0)
	{
		$array[] = array('login' => $_POST[login], 'passwd' => hash('whirlpool', $_POST[passwd]));
		file_put_contents("../private/passwd", serialize($array));
		echo "OK\n";
		header('Location: index.html');
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>
