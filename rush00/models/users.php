<?php

/*
** Function creates user.
** If user created - return TRUE
 */

function create_user($login, $passwd)
{
	global $mysqli;

	if (empty($login) || empty($passwd))
		return FALSE;

	// Check if user exists

	$user = get_user($login);
	if ($user)
		return FALSE;

	// Create user

	$passwd = hash('whirlpool', $passwd);

	$query = "INSERT INTO `users` (`login`, `passwd`, `mail`) VALUES (?, ?, NULL);";
	if (!($stmt = $mysqli->prepare($query)))
	{
	    // echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	    return FALSE;
	}
	$stmt->bind_param("ss", $login, $passwd);
	if (!$stmt->execute())
	{
		// echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		return FALSE;
	}
	$stmt->close();
	return TRUE;

}

function get_user($login)
{
	global $mysqli;

	if (empty($login))
		return FALSE;

	// Get user
	$user = array();
	$query = "SELECT id, login, passwd, mail, is_admin FROM users WHERE login = ?;";
	if (!($stmt = $mysqli->prepare($query)))
	{
	    // echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	    return NULL;
	}
	$stmt->bind_param("s", $login);
	if (!$stmt->execute())
	{
		// echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		return NULL;
	}
	$stmt->store_result();
	$stmt->bind_result($user['id'], $user['login'], $user['passwd'], $user['mail'], $user['is_admin']);

	if ($stmt->num_rows == 0)
	{
		// echo "No such user";
		$stmt->close();
		return NULL;
	}
	$stmt->fetch(); // Put data from row into $user
	$stmt->close();
	return $user;
}

function auth_user($user, $passwd)
{
	if (empty($user) || empty($passwd))
		return FALSE;

	if ($user[passwd] == hash('whirlpool', $passwd))
		return TRUE;
	return FALSE;
}

?>
