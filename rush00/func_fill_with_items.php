<?php
include_once "db_connection.php";
include "models/items.php";

function fill_with_items($only_available, $category_ids)
{
	$items = get_items($only_available, $category_ids);
	foreach ($items as $item)
	{
?>
		<article class="item">
			<?php echo '<img class="item_img" width="20" height="20" src="'.$item[img].'">'; ?>
			<p class="item_title">
				<?php echo('<div class="row" align="center">'.$item[name].'<br></div>'); ?>
				<span class="item_price">
					<?php echo('<div class="row" align="center"> $'.$item[price].'<br></div>'); ?>
					</span>
				</p>
			<?php echo '<a href="cart.php?action=add_item&item_id='.$item[id].'"><div class="row" align="center"><img src="cart_img/z_cart.png" width="25" height="25" alt="Add to cart"></a></div>'; ?>
		</article>
<?php
	}
}

?>

