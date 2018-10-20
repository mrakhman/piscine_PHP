<?php include "func_category_filter.php"; ?>
<p align="right"> Contact us: <a align="right" href="mailto:mrakhman@student.42.fr?Subject=I_love_your_website" target="_top"> mrakhman@student.42.fr </a></p> 
<p align="right"> <a align="right" href="mailto:vapiatko@student.42.fr?Subject=I_love_your_website" target="_top"> vapiatko@student.42.fr </a></p>

<h1 align="center"> Winter Hiking </h1>
<nav>
	<div class="dropdown">
			<button class="dropbtn">Home</button>
		<div class="dropdown-content">
			<a href="landing_page.php">Home page</a>
		</div>
	</div>

		<div class="dropdown">
			<button class="dropbtn">Products</button>
			<div class="dropdown-content">
			<?php category_filter(); ?>
		</div>
	</div>

	<div class="dropdown">
			<button class="dropbtn">Cart</button>
			<div class="dropdown-content">
			<a href="content/cart.html">See cart</a>
			<!-- <a href="#">Checkout</a> -->
			<a href="#">Clear cart</a>
		</div>
	</div>
	<div class="dropdown">
			<button class="dropbtn">Account</button>
			<div class="dropdown-content">
			<a href="register.php">Register</a>
			<a href="login_logout.php">My account</a>
		</div>
	</div>
</nav>

