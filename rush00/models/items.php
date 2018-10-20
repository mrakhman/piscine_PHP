<?php

/*
** $item = {
	"name": "Backpack",
	"description": "Sooper cool description",
	"price": 20,
	"img": "https://url",
	"availability": 1,
	"categories": [category1, category2]
}
** Get $item and put into database. No checks on duplicates and categories
 */

function create_item($item)
{
	global $mysqli;

	if (empty($item['name']) || empty($item['description'])
		|| empty($item['price']) || empty($item['img'])
		|| empty($item['availability']))
		return FALSE;

	$query = "INSERT INTO `items` (`name`, `description`, `price`, `img`, `availability`) VALUES (?, ?, ?, ?, ?);";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("ssisi", $item['name'], $item['description'], $item['price'], $item['img'], $item['availability']);
	if (!$stmt->execute())
		return FALSE;
	$stmt->close();
	
	$last_id = $mysqli->insert_id;
	$query = "INSERT INTO `item_categories` (`item_id`, `category_id`) VALUES (?, ?);";
	$stmt = $mysqli->prepare($query);
	foreach ($item['categories'] as $category) {
		$stmt->bind_param('ii', $last_id, $category['id']);
		$stmt->execute();
	}
	$stmt->close();
	return TRUE;
}

/*
** $only_available: if not - show all, if true - only available
** $category_ids - categories of items
** Get every item (filter on availability only) from db and sort them localy (not optimal, but more easy)
 */

function get_items($only_available, $category_ids)
{
	global $mysqli;

	$items = array();

	if ($only_available)
		$expression = " WHERE items.availability = 1";
	$query = "SELECT 
				items.id, items.name, items.description, items.price, items.img, items.availability, item_categories.category_id, categories.name
				FROM items 
				LEFT JOIN item_categories ON items.id = item_categories.item_id 
				LEFT JOIN categories on item_categories.category_id = categories.id".$expression.";";


	if ($result = $mysqli->query($query))
	{
	    while ($row = $result->fetch_row())
	    {
	    	if (isset($items[$row[0]]))
	    	{
	    		if ($row[6] && $row[7])
		    		$items[$row[0]]['categories'][] = array('id' => $row[6], 'name' => $row[7]);
	    	}
		    else
		    {
		        $items[$row[0]] = array('id' => $row[0], 'name' => $row[1], 'description' => $row[2],
		        	'price' => $row[3], 'img' => $row[4], 'availability' => $row[5], 'categories' => []);
		        if ($row[6] && $row[7])
		        	$items[$row[0]]['categories'][] = array('id' => $row[6], 'name' => $row[7]);
		    }
	    }
	    $result->close();
	}
	// Filter
	if (!empty($category_ids))
	{
		$items = array_filter($items, function ($value) use ($category_ids) {
			foreach ($value['categories'] as $category) {
				if (in_array($category['id'], $category_ids))
					return TRUE;
			}
			return FALSE;
		});
	}

	return $items;
}

function get_item($item_id)
{
	global $mysqli;

	$items = array();

	$query = "SELECT 
				items.id, items.name, items.description, items.price, items.img, items.availability, item_categories.category_id, categories.name
				FROM items 
				LEFT JOIN item_categories ON items.id = item_categories.item_id 
				LEFT JOIN categories on item_categories.category_id = categories.id WHERE items.id = ".$item_id.";";

	if ($result = $mysqli->query($query))
	{
	    while ($row = $result->fetch_row())
	    {
	    	if (isset($items[$row[0]]))
	    	{
	    		if ($row[6] && $row[7])
		    		$items[$row[0]]['categories'][] = array('id' => $row[6], 'name' => $row[7]);
	    	}
		    else
		    {
		        $items[$row[0]] = array('id' => $row[0], 'name' => $row[1], 'description' => $row[2],
		        	'price' => $row[3], 'img' => $row[4], 'availability' => $row[5], 'categories' => []);
		        if ($row[6] && $row[7])
		        	$items[$row[0]]['categories'][] = array('id' => $row[6], 'name' => $row[7]);
		    }
	    }
	    $result->close();
	}
	return $items[$item_id];
}

function edit_item($item)
{
	global $mysqli;

	if (empty($item['name']) || empty($item['description'])
		|| empty($item['price']) || empty($item['img'])
		|| empty($item['availability']) || empty($item['id']))
		return FALSE;

	$query = "UPDATE `items` SET `name` = ?, `description` = ?, `price` = ?, `img` = ?, `availability` = ? WHERE `id` = ?;";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("ssisii", $item['name'], $item['description'], $item['price'], $item['img'], $item['availability'], $item['id']);
	if (!$stmt->execute())
		return FALSE;
	$stmt->close();

	$query = "DELETE FROM `item_categories` WHERE `item_id` = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param('i', $item['id']);
	$stmt->execute();
	$stmt->close();

	$query = "INSERT INTO `item_categories` (`item_id`, `category_id`) VALUES (?, ?);";
	$stmt = $mysqli->prepare($query);
	foreach ($item['categories'] as $category) {
		$stmt->bind_param('ii', $item['id'], $category['id']);
		$stmt->execute();
	}
	$stmt->close();
	return TRUE;
}
