#!/usr/bin/php
<?PHP
	function ft_split($tab)
	{
		$tab_sorted = array_filter(explode(" ", $tab));
		sort($tab_sorted);
		return($tab_sorted);
	}
?>
