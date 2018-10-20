<?php
/*
** $category = {
	"name": "Super cool name"
}
** Creates category (no duplicate check)
** Returns FALSE if error, itself if ok
 */

function create_category($category)
{
	global $mysqli;

	if (empty($category['name']))
		return FALSE;

	$query = "INSERT INTO `categories` (`name`) VALUES (?);";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("s", $category['name']);
	if (!$stmt->execute())
		return FALSE;
	$last_id = $mysqli->insert_id;
	$stmt->close();
	$category['id'] = $last_id;
	return $category;
}

function edit_category($category)
{
	global $mysqli;

	if (empty($category['name']) || empty($category['id']))
		return FALSE;

	$query = "UPDATE `categories` SET `name` = ? WHERE `id` = ?;";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("si", $category['name'], $category['id']);
	if (!$stmt->execute())
		return FALSE;
	$stmt->close();

	return TRUE;
}

function delete_category($category)
{
	global $mysqli;

	if (empty($category['id']))
		return FALSE;

	$query = "DELETE FROM `item_categories` WHERE `category_id` = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param('i', $category['id']);
	$stmt->execute();
	$stmt->close();

	$query = "DELETE FROM `categories` WHERE `id` = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param('i', $category['id']);
	$stmt->execute();
	$stmt->close();
	return TRUE;
}

function get_categories()
{
	global $mysqli;

	$categories = array();
	$query = "SELECT `id`, `name` FROM `categories`;";
	if ($result = $mysqli->query($query))
	{
	    while ($row = $result->fetch_row())
	        $categories[] = array('id' => $row[0], 'name' => $row[1]);
	    /* очищаем результирующий набор */
	    $result->close();
	}
    return $categories;
}
