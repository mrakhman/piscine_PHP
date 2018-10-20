#!/usr/bin/php
<?PHP

	if ($argc > 1)
	{
		$i = 1;
		while ($i < $argc)
		{
			$str .= $argv[$i]." ";
			$i++;
		}
		$str_trim = trim($str);
		$array = array_filter(explode(" ", $str_trim));
		sort($array);
		foreach ($array as $v) {
			echo "$v\n";
		}
	}
?>
