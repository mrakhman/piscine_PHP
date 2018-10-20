#!/usr/bin/php
<?PHP
	if ($argc > 1)
	{
		$str = trim(preg_replace("/\s+/", " ", $argv[1]));
		echo ("$str\n");
	}
?>
