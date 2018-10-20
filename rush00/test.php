<?php

include_once "db_connection.php";
include "models/categories.php";
include "models/items.php";

// $categories = get_categories();

// echo "<table><tr><th>ID</th><th>Name</th></tr>";
// foreach ($categories as $category) {
// 	echo "<tr><th>".$category['id']."</th><th>".$category['name']."</th></tr>";
// }
// echo "</table>";

$items = get_items(0, [1, 2, 3]);
header("Content-Type: text/plain");
print_r($items);
