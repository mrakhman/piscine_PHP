#!/usr/bin/php
<?PHP

	if ($argc > 1)
	{
		$array = array_values(array_filter(explode(" ", $argv[1])));
		$word_nb = count($array);
		$i = 1;
		while ($i < $word_nb)
			echo $array[$i++]." ";
		echo $array[0]."\n";
	}
?>
