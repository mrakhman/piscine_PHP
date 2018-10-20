<!DOCTYPE html>
<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="style/landing_page.css">
		<title>winter hiking</title>
	</HEAD>
	<BODY>
	<?php
		include 'html/menu.php';
		include "models/items.php";
		session_start();
		if ($_GET['action'] === 'add_item' && !empty($_GET['item_id']))
		{
			$item = get_item($_GET['item_id']);
			if ($item)
				$_SESSION['cart'][] = get_item($_GET['item_id']);
		}

		if ($_GET['action'] === 'clear')
		{
			$_SESSION['cart'] = [];
		}

		foreach ($_SESSION['cart'] as $item) {
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
	?>
	<a href="cart.php?action=clear" >Clear cart</a>

	</BODY>
</HTML>
