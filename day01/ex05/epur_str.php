#!/usr/bin/php
<?PHP
	if ($argc == 2)
	{
		$array = array_filter(explode(" ", $argv[1]));
		foreach ($array as $v) {
			$str .= $v." ";
		}
		echo(trim($str)."\n");
	}
?>
