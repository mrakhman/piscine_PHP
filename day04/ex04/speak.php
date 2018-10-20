<?PHP
session_start();
	if ($_POST[msg] != '' && $_SESSION[loggued_on_user] != '')
	{
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists("../private/chat"))
			$chat = array();
		else
			$chat = unserialize(file_get_contents("../private/chat"));
		$fp = fopen("../private/chat", 'w');
		flock($fp, LOCK_EX);
		$chat[] = array('login' => $_SESSION[loggued_on_user], 'time' => time(), 'msg' => $_POST[msg]);
		file_put_contents("../private/chat", serialize($chat));
		fclose($fp);
	}
	if ($_SESSION[loggued_on_user] != '')
	{
		?>
			<html>
			<head>
				<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
			</head>
			<body>
			<form method="post" action="speak.php">
				Enter msg: <input type="text" name="msg"/>
				<input type="submit" name="submit" value="OK"/>
			</form>
			</body>
			</html>
		<?PHP
	}
	else	
		echo "ERROR\n";
