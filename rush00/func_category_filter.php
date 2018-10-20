<?php
include_once "db_connection.php";
include "models/categories.php";

function category_filter()
{
	$categories = get_categories();
	foreach ($categories as $category)
	{
		echo '<a href="landing_page.php?category_id='.$category[id].'">'.$category[name].'</a><br>';
	}
}
?>
