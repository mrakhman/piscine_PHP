#!/usr/bin/php
<?PHP

	function ft_is_sort($tab)
	{
		$array = $tab;
		sort($array);
		$i = 0;
		while ($i < count($array))
		{
			if ($array[$i] != $tab[$i])
				return FALSE;
			$i++;
		}
		return TRUE;
	}
?>
