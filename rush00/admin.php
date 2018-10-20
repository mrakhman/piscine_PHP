<?php

include_once "db_connection.php";
include "models/categories.php";
include "models/items.php";

/*
<form method="post" action="login.php">
	Username <input type="text" name="login"/>
	<br />
	Password <input type="password" name="passwd""/>
	<br>
	<input type="submit" name="submit" value="OK"/>
</form>
*/

function admin_items()
{
	$items = get_items(0, NULL);
	$categories = get_categories();
	foreach ($items as $item) {
?>
		<form method="post" action="admin.php?action=edit_item">
		<input type="text" name="id" hidden value="<?=$item['id'];?>" />
		<tr>
			<td><?=$item['id'];?></td>
		<td><input type="text" name="name" value="<?=$item['name'];?>" /></td>
		<td><input type="text" name="description" value="<?=$item['description']?>" /></td>
		<?php
		echo '<td><input type="text" name="price" value="'.$item['price'].'" /></td>';
		echo '<td><input type="text" name="img" value="'.$item['img'].'" /></td>';
		echo '<td><select name="availability">';
		if ($item['availability'])
		{
			echo '<option selected value=1>Yes</option>';
			echo '<option value=0>No</option>';
		}
		else
		{
			echo '<option value=1>Yes</option>';
			echo '<option selected value=0>No</option>';
		}
		echo '</select></td>';
		echo '<td><select size="'.count($categories).'" multiple name="categories[]">';
		foreach ($categories as $category) {
			echo "<option ";
			foreach ($item['categories'] as $item_cat) {
				if ($item_cat['id'] === $category['id']) {
					echo "selected ";
					break;
				}
			}
			echo "value=".$category['id'].">".$category['name'];
			echo "</option>";
		}
		echo '</select></td>';
		echo '<td> <input type="submit" name="submit" value="OK"/> </td>';
		echo "</tr>";
		echo "</form>";
	}
	echo '<form method="post" action="admin.php?action=create_item">';
	echo "<tr>";
	echo "<td>New</td>";
	echo '<td><input type="text" name="name" /></td>';
	echo '<td><input type="text" name="description" /></td>';
	echo '<td><input type="text" name="price" /></td>';
	echo '<td><input type="text" name="img" /></td>';
	echo '<td><select name="availability">';
	echo '<option selected value=1>Yes</option>';
	echo '<option value=0>No</option>';
	echo '</select></td>';
	echo '<td><select size="'.count($categories).'" multiple name="categories[]">';
	foreach ($categories as $category) {
		echo "<option ";
		echo "value=".$category['id'].">".$category['name'];
		echo "</option>";
	}
	echo '</select></td>';
	echo '<td> <input type="submit" name="submit" value="OK"/> </td>';
	echo "</tr>";
	echo "</form>";
}

function admin_categories()
{
	$categories = get_categories();
	foreach ($categories as $category) {
		echo "<tr>";
		echo '<form method="post" action="admin.php?action=edit_category">';
		echo '<input type="text" name="id" hidden value="'.$category['id'].'" />';
		echo "<td>".$category['id']."</td>";
		echo '<td><input type="text" name="name" value="'.$category['name'].'" /></td>';
		echo '<td> <input type="submit" name="submit" value="OK"/> </td>';
		echo "</form>";
		echo '<td><form method="post" action="admin.php?action=delete_category&category_id='.$category['id'].'">';
		echo '<input type="submit" name="submit" value="OK"/>';
		echo '</form></td>';
		echo "</tr>";
	}
	echo '<form method="post" action="admin.php?action=create_category">';
	echo "<tr>";
	echo "<td>New</td>";
	echo '<td><input type="text" name="name" /></td>';
	echo '<td> <input type="submit" name="submit" value="OK"/> </td>';
	echo "</tr>";
	echo "</form>";
}

session_start();
if (!$_SESSION['user']['is_admin'])
{
	header("Location: landing_page.php");
	exit (0);
}

if ($_GET['action'] == 'edit_item' && !empty($_POST['id']) && !empty($_POST['name'])
	&& !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['img'])
	&& !empty($_POST['availability']) && !empty($_POST['categories']))
{
	$item = array(
		'id' => $_POST['id'],
		'name' => $_POST['name'],
		'description' => $_POST['description'],
		'price' => $_POST['price'],
		'img' => $_POST['img'],
		'availability' => $_POST['availability'],
		'categories' => []
	);
	foreach ($_POST['categories'] as $category) {
		$item['categories'][] = array(
			'id' => $category
		);
	}
	edit_item($item);
}

if ($_GET['action'] == 'create_item' && !empty($_POST['name'])
	&& !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['img'])
	&& !empty($_POST['availability']) && !empty($_POST['categories']))
{
	$item = array(
		'id' => $_POST['id'],
		'name' => $_POST['name'],
		'description' => $_POST['description'],
		'price' => $_POST['price'],
		'img' => $_POST['img'],
		'availability' => $_POST['availability'],
		'categories' => []
	);
	foreach ($_POST['categories'] as $category) {
		$item['categories'][] = array(
			'id' => $category
		);
	}
	create_item($item);
}

if ($_GET['action'] == 'create_category' && !empty($_POST['name']))
{
	$category = array(
		'name' => $_POST['name']
	);
	create_category($category);
}

if ($_GET['action'] == 'edit_category' && !empty($_POST['name']) && !empty($_POST['id']))
{
	$category = array(
		'name' => $_POST['name'],
		'id' => $_POST['id']
	);
	edit_category($category);
}

if ($_GET['action'] == 'delete_category' && !empty($_GET['category_id']))
{
	$category = array(
		'id' => $_GET['category_id']
	);
	delete_category($category);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
</head>
<body>
	<h1>Hello, Admin!</h1>
	<br>
	<h3> Items </h3>
	<table border=1>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Description</td>
			<td>Price</td>
			<td>Img</td>
			<td>Available?</td>
			<td>Categories</td>
			<td>Update</td>
		</tr>
		<?php admin_items(); ?>
	</table>
	<br>
	<h3> Categories </h3>
	<table border=1>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Update</td>
			<td>Delete</td>
		</tr>
		<?php admin_categories(); ?>
	</table>
<!-- 	<br>
	<h3>Users</h3>
	<table border=1>
		<tr>
			<td>ID</td>
			<td>Login</td>
			<td>Password</td>
			<td>Update</td>
		</tr>
		<?php //admin_categories(); ?>
	</table> -->
</body>
</html>
