#!/usr/bin/php
<?PHP

function append_argv($argc, $argv)
{
	$i = 1;
	while ($i < $argc)
	{
		$str .= $argv[$i]." ";
		$i++;
	}
	return $str;
}

function one_space($str)
{
	$str_trim = trim($str);
	while ((strpos($str_trim, "  ")) == TRUE)
		$str_trim = str_replace("  ", " ", $str_trim);
	return $str_trim;
}

function user_sort($str_a, $str_b)
{
	$str_a = strtolower($str_a);
	$str_b = strtolower($str_b);
	$compare = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$i = 0;
	while ($i < strlen($str_a) || $i < strlen($str_b))
	{
		$first = strpos($compare, $str_a[$i]);
		$second = strpos($compare, $str_b[$i]);
		if ($first < $second)
			return -1;
		else if ($first > $second)
			return 1;
		else
			$i++;
	}
}

if ($argc > 1)
{
	$s = append_argv($argc, $argv);
	$s = one_space($s);
	$tab = explode(" ", $s);
	usort($tab, "user_sort");
	foreach ($tab as $v)
		echo ("$v\n");
}

?>
