<?PHP
session_start();
	if ($_SESSION[loggued_on_user] != '')
	{
		date_default_timezone_set("Europe/Paris");
		if (!file_exists("../private/chat"))
			$chat = array();
		else
			$chat = unserialize(file_get_contents("../private/chat"));
		foreach ($chat as $key => $value)
		{
			$time = date("[H:i]", $value[time]);
			echo "$time <b>$value[login]</b>: $value[msg]<br />\n";
		}
	}
	else
		echo "ERROR\n";
?>
