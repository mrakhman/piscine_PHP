#!/usr/bin/php
<?PHP
    if ($argc > 1)
{
	$array = array_filter(explode(" ", $argv[1]));
	if (count($array) != 5)
	{
		echo("Wrong Format\n");
		exit();
	}

    function week($str)
    {
    	return(preg_match("/^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi^[S|s]amedi|^[D|d]imanche/", $str));	
   	}

   	function day($str)
   	{
   		if (preg_match("/[0-9]{1,2}/", $str) == 0)
   			return FALSE;
   		if ((int)$str < 1 || (int)$str > 31)
   			return FALSE;
   		return TRUE;
   	}

   	function month($str)
   	{
   		return(preg_match("/^[J|j]anvier|^[F|f][é|e]vrier|^[M|m]ars|^[A|a]vril|^[M|m]ai|^[J|j]uin|^[J|j]uillet|^[A|a]o[û|u]t|^[S|s]eptembre|^[O|o]ctobre|^[N|n]ovembre|^[D|d][é|e]cembre|/", str));
   	}

   	function year($str)
   	{
   		if (preg_match("/[1-9]{1}[0-9]{3}/", $str) == 0)
   			return FALSE;
   		return TRUE;
   	}

   	function h_m_s($str)
   	{
   		if (preg_match("/[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $str) == 0)
   			return FALSE;
   		$time_array = array_filter(explode(":", $str));
   		if ((int)$time_array[0] < 0 || (int)$time_array[0] > 23 || (int)$time_array[1] < 0 || (int)$time_array[1] > 59 || (int)$time_array[2] < 0 || (int)$time_array[2] > 59)
   			return FALSE;
   		return TRUE;
   	}

   	function month_nb($str)
   	{
   		if (preg_match("/[J|j]anvier/", $str) == TRUE)
   			return (1);
   		if (preg_match("/[F|f][é|e]vrier/", $str) == TRUE)
   			return (2);
   		if (preg_match("/[M|m]ars/", $str) == TRUE)
   			return (3);
   		if (preg_match("/[A|a]vril/", $str) == TRUE)
   			return (4);
   		if (preg_match("/[M|m]ai/", $str) == TRUE)
   			return (5);
   		if (preg_match("/[J|j]uin/", $str) == TRUE)
   			return (6);
   		if (preg_match("/[J|j]uillet/", $str) == TRUE)
   			return (7);
   		if (preg_match("/[A|a]o[û|u]t/", $str) == TRUE)
   			return (8);
   		if (preg_match("/[S|s]eptembre/", $str) == TRUE)
   			return (9);
   		if (preg_match("/[O|o]ctobre/", $str) == TRUE)
   			return (10);
   		if (preg_match("/[N|n]ovembre/", $str) == TRUE)
   			return (11);
   		if (preg_match("/[D|d][é|e]cembre/", $str) == TRUE)
   			return (12);
   	}

    if ((week($array[0]) == TRUE) && (day($array[1]) == TRUE) && (month($array[2]) == TRUE) && (year($array[3]) == TRUE) && (h_m_s($array[4]) == TRUE))
    {
    	$time_array = array_filter(explode(":", $array[4]));
    	
    	date_default_timezone_set("Europe/Paris");

    	if (mktime((int)$time_array[0], (int)$time_array[1], (int)$time_array[2], month_nb($arrray[2]), (int)$array[1], (int)$array[3]) == FALSE)
    	{
    		echo "Wrong Format\n";
    		exit();
    	}
    	else
    	{
    		echo (mktime((int)$time_array[0], (int)$time_array[1], (int)$time_array[2], month_nb($arrray[2]), (int)$array[1], (int)$array[3]));
    		echo "\n";
    	}
    }
    else
    	echo "Wrong Format\n";
}

?>
