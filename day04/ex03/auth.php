<?PHP
function auth($login, $passwd)
{
	if (!($login != '' || $passwd != ''))
		return FALSE;
	if(!file_exists("../private"))
		return FALSE;
	if (!file_exists("../private/passwd"))
		return FALSE;
	$array = unserialize(file_get_contents("../private/passwd"));
	$marker = -1;
	foreach ($array as $key => $value)
	{
		if ($login === $value[login])
			$marker = $key;
	}
	if ($marker === -1)
		return FALSE;
	if (hash('whirlpool', $passwd) === $array[$key][passwd])
		return TRUE;
	return FALSE;
}

?>
